<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barang = Barang::all();
        $response=[
            'success'=>true,
            'message'=>'suplier list',
            'data'=>$barang,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'nama_barang'=>'required|max:50',
            'harga'=>'required|max:250|numeric',
            'stok'=>'required|max:50|numeric',
            'keterangan'=>'required|max:50',
            'gambar'=>'required|max:5000',
        ]);
        if ($validator->fails()) {
            $response=[
                'success'=>false,
                'message'=>$validator->errors(),
                'data'=>'',
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $file = $request->file('gambar');
            $imageName = Str::random() . '-' . time() . '.' . $request->gambar->extension();
            $file->move(public_path('image'), $imageName);


            $barang=Barang::create([
                'nama_barang'=>$request->nama_barang,
                'harga'=>$request->harga,
                'stok'=>$request->stok,
                'keterangan'=>$request->keterangan,
                'gambar'=>$imageName,
            ]);
            $response=[
                'success'=>true,
                'message'=>'data created',
                'data'=>$barang
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $barang = Barang::find($id);
        $response=[
            'success'=>true,
            'message'=>'suplier list',
            'data'=>$barang,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $barang=Barang::find($id);
        $validator = Validator::make($request->all(),[
            'nama_barang'=>'required|max:50',
            'harga'=>'required|max:250|numeric',
            'stok'=>'required|max:50|numeric',
            'keterangan'=>'required|max:50',
            'gambar'=>'required|max:5000',
        ]);
        if ($validator->fails()) {
            $response=[
                'success'=>false,
                'message'=>$validator->errors(),
                'data'=>'',
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $file = $request->file('gambar');
            $imageName = Str::random() . '-' . time() . '.' . $request->gambar->extension();
            $file->move(public_path('image'), $imageName);


            $barang->update([
                'nama_barang'=>$request->nama_barang,
                'harga'=>$request->harga,
                'stok'=>$request->stok,
                'keterangan'=>$request->keterangan,
                'gambar'=>$imageName,
            ]);
            $response=[
                'success'=>true,
                'message'=>'data created',
                'data'=>$barang
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Barang::find($id)->delete();
        $response    = [
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
            'data'    => null
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
