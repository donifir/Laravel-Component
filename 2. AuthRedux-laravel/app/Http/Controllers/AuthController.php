<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=User::all();
        $response=[
            'success'=>true,
            'message'=>'list user',
            'data'=>$users
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        //
        $validation = Validator::make($request->all(),[
            'name'=>'required|max:60|min:3',
            'email'=>'required|max:60|min:3|unique:users|email',
            'password'=>'required|max:60|min:8',
            'confirm_password'=>'required|max:60|min:8|same:password',
        ]) ;
        if ($validation->fails()) {
            $response= [
                'suceess'=>false,
                'message'=>$validation->errors()
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $token = $user->createToken($user->email . '_Token')->plainTextToken;
            $response=[
                'suceess'=>true,
                'username'=>$user->name,
                'token'=>$token,
                'message'=>'register Successfully',
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function login(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:191',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if ( $validator->fails()) {
            $response=[
                'suceess'=>false,
                'messages'=>$validator->errors(),
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else if (!$user || !Hash::check($request->password, $user->password)) {
            $response=[
                'suceess'=>false,
                'messages'=>'invalid credensial',
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }else {
            $token = $user->createToken($user->email . '_Token')->plainTextToken;
            $response=[
                'suceess'=>true,
                'messages'=>'Login Succesfully',
                'token' => $token,
                'username' => $user->name,
            ];
            return response()->json($response, Response::HTTP_OK);
        }
    }
    public function logout()
    {
        //
        auth()->user()->tokens()->delete();
        $response=[
            'suceess'=>true,
            'messages'=>'Logot Succesfully',
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
