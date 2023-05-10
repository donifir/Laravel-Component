<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $supliers=Crud::all();
        $response=[
            'success'=>true,
            'message'=>'list data suplier',
            'data'=>$supliers,
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
            'nama_suplier'=>'required|max:50',
            'alamat_suplier'=>'required|max:250',
            'telp_suplier'=>'required|max:50',
        ]);
        if ($validator->fails()) {
            $response=[
                'success'=>false,
                'message'=>$validator->errors(),
                'data'=>'',
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $suplier=Crud::create([
                'nama_suplier'=>$request->nama_suplier,
                'alamat_suplier'=>$request->alamat_suplier,
                'telp_suplier'=>$request->telp_suplier,
            ]);
            $response=[
                'success'=>true,
                'message'=>'data created',
                'data'=>$suplier
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
        $supliers=Crud::find($id);
        $response=[
            'success'=>true,
            'message'=>'list data suplier',
            'data'=>$supliers,
        ];
        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $validator = Validator::make($request->all(),[
            'nama_suplier'=>'required|max:50',
            'alamat_suplier'=>'required|max:250',
            'telp_suplier'=>'required|max:50',
        ]);
        if ($validator->fails()) {
            $response=[
                'success'=>false,
                'message'=>$validator->errors(),
                'data'=>'',
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $suplier=Crud::Find($id);
            $suplier->update([
                'nama_suplier'=>$request->nama_suplier,
                'alamat_suplier'=>$request->alamat_suplier,
                'telp_suplier'=>$request->telp_suplier,
            ]);
            $response=[
                'success'=>true,
                'message'=>'data updated',
                'data'=>$suplier
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
        Crud::Find($id)->delete();
        $response=[
            'success'=>true,
            'message'=>'data deleted',
            'data'=>""
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
