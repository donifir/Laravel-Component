<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{

    public function index(Request $request)
    {
        if ($request->search) {
            $barangs = Barang::where('nama_barang', 'LIKE', "%{$request->search}%")
                ->orWhere('harga', 'LIKE', "%{$request->search}%")
                ->orWhere('keterangan', 'LIKE', "%{$request->search}%")
                ->orWhere('stok', 'LIKE', "%{$request->search}%")
                ->orderby('id')
                ->paginate(5);
        } else {
            $barangs = Barang::orderBy('id')->paginate(5);
        }

   
        return view('barang.index', compact('barangs'));
    }

    // public function index2(Request $request)
    // {
    //     $barangs = Barang::search($request->search)->get();
    //     dd($request->search);
    //     return view('barang.index', compact('barangs'));
    // }

    public function create()
    {
        //
        $supliers = Suplier::all();
        return view('barang.create', compact('supliers'));
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'namabarang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'required',
            'suplier' => 'required',
            'gambar' => 'required',
        ]);

        $imgName = Hash::make($request->gambar . time()) . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $imgName);

        Barang::create([
            'nama_barang' => $request->namabarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
            'suplier_id' => $request->suplier,
            'gambar' =>  $imgName
        ]);
        Alert::success('Info Title', 'Info Message');
        return redirect('/barang');
    }


    public function show($id)
    {
        //
        $barang = barang::find($id);
        return view('barang.show', compact('barang'));
    }


    public function edit($id)
    {
        //
        $supliers = Suplier::all();
        $barang = barang::find($id);
        return view('barang.edit', compact('barang', 'supliers'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'namabarang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'keterangan' => 'required',
            'suplier' => 'required',

        ]);

        if ($request->gambar) {
            $imgName = Hash::make($request->gambar) . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('image'), $imgName);
        } else {
            $imgName = Barang::find($id)->value('gambar');
        }


        Barang::find($id)->update([
            'nama_barang' => $request->namabarang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
            'suplier_id' => $request->suplier,
            'gambar' =>  $imgName
        ]);
        Alert::success('Berhasil', 'Data Barang Berhasil diubah');
        return redirect('/barang');
    }

    public function destroy($id)
    {
        //
        Barang::find($id)->delete();
        Alert::success('Berhasil', 'Data Barang Berhasil dihapus');
        return redirect('/barang');
    }
}
