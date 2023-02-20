<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SuplierController extends Controller
{

    public function index()
    {
        $supliers = Suplier::all();
        return view('suplier.index', compact('supliers'));
    }


    public function create()
    {
        return view('suplier.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'namasuplier' => 'required|max:50',
            'alamatsuplier' => 'required|max:50',
            'telpsuplier' => 'required|max:50',
        ]);

        Suplier::create([
            'nama_suplier' => $request->namasuplier,
            'alamat_suplier' => $request->alamatsuplier,
            'telp_suplier' => $request->telpsuplier,
        ]);
        Alert::info('Info Title', 'Info Message');
        return redirect('/suplier');
    }

    public function edit($id)
    {
        $suplier = Suplier::find($id);
        return view('/suplier/edit', compact('suplier'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'namasuplier' => 'required|max:50',
            'alamatsuplier' => 'required|max:50',
            'telpsuplier' => 'required|max:50',
        ]);

        Suplier::find($id)->update([
            'nama_suplier' => $request->namasuplier,
            'alamat_suplier' => $request->alamatsuplier,
            'telp_suplier' => $request->telpsuplier,
        ]);

        return redirect('/suplier');
    }


    public function destroy($id)
    {
        //
        Suplier::find($id)->delete();
        Alert::success('Info Title', 'Info Message');
        return redirect('/suplier');
    }
}
