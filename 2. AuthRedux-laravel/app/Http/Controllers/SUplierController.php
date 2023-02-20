<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SUplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suplier=Suplier::all();
        $response=[
            'success'=>true,
            'message'=>'suplier list',
            'data'=>$suplier,
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
            $suplier=Suplier::create([
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            $suplier=Suplier::Find($id);
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
    public function destroy( $id)
    {
        //
        $suplier=Suplier::Find($id)->delete();
        $response=[
            'success'=>true,
            'message'=>'data deleted',
            'data'=>""
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
