<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class imageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ImageUpload::orderBy('id', 'desc')->get();
        $response = [
            'success' => true,
            'message' => 'data image',
            'data' => $data
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama_gambar' => ['required'],
            'gambar' => ['required'],
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
                'data' => ''
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else {
            # code...
            $file = $request->file('gambar');
            $imageName = Str::random() . '-' . time() . '.' . $request->gambar->extension();
            $file->move(public_path('image'), $imageName);

            $data = ImageUpload::create([
                'nama_gambar' => $request->nama_gambar,
                'gambar' => $imageName,
            ]);

            $response    = [
                'success' => true,
                'message' => 'Transaksi Berhasil',
                'data'    => $data
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
        $data = ImageUpload::find($id);
        $response = [
            'success' => true,
            'message' => 'data image',
            'data' => $data
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama_gambar' => ['required'],
            'gambar' => ['required'],
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
                'data' => ''
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else {
            # code...
            $file = $request->file('gambar');
            $imageName = Str::random() . '-' . time() . '.' . $request->gambar->extension();
            $file->move(public_path('image'), $imageName);

            $data=ImageUpload::find($id);
            $data ->update([
                'nama_gambar' => $request->nama_gambar,
                'gambar' => $imageName,
            ]);

            $response    = [
                'success' => true,
                'message' => 'Transaksi Berhasil',
                'data'    => $data
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
        ImageUpload::find($id)->delete();
        $response    = [
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
            'data'    => null
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
