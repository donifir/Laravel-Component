<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Validator;
// use Validator;
use Symfony\Component\HttpFoundation\Response;

class CrudController extends Controller
{
 
    public function index()
    {
        //
        $barang = Crud::orderBy('id','desc')->get();
        $response = [
            'success'=>true,
            'messages'=>'list data terbaru',
            'data'=>$barang
        ];
        return response()->json($response, Response::HTTP_OK);

    }


    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'nama'=>'required|max:50',
            'email'=>'required',
            'alamat'=>'required|min:10',
            'quotes'=>'required|min:10'
        ]);
      
        if ($validator->fails()) {
            $response =[
                'success'=>false,
                'message'=>$validator->errors(),
                'data'=>null
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $data=Crud::create([
                'nama'=>$request->nama,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'quotes'=>$request->quotes,
            ]);
            $response =[
                'success'=>true,
                'message'=>'data berhasil ditambahkan',
                'data'=>$data
            ];
            return response()->json($response, Response::HTTP_OK);
        }
  
     
    }

    public function show($id)
    {
        //
        $barang = Crud::find($id);
        $response = [
            'success'=>true,
            'messages'=>'detail data',
            'data'=>$barang
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),[
            'nama'=>'required|max:50',
            'email'=>'required',
            'alamat'=>'required|min:10',
            'quotes'=>'required|min:10'
        ]);
      
        if ($validator->fails()) {
            $response =[
                'success'=>false,
                'message'=>$validator->errors(),
                'data'=>null
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $data=Crud::find($id);
            $data->update([
                'nama'=>$request->nama,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'quotes'=>$request->quotes,
            ]);
            $response =[
                'success'=>true,
                'message'=>'data berhasil diupdate',
                'data'=>$data
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }


    public function destroy($id)
    {
        //
        Crud::find($id)->delete();
        $response =[
            'success'=>true,
            'message'=>'data berhasil dihapus',
            'data'=>null
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
