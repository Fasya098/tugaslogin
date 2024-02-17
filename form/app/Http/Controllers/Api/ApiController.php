<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    //register api (post)
    public function register(Request $request){

        //validasi data
        $request->validate([
            'name'  => 'required',
            'email'  => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        //simpan data
        User::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  => Hash::make ($request->password)
        ]);

        //response
        return response()->json([
            'status' => true,
            'message' => 'data berhasil disimpan'
        ]);
    }

    //login api (post)
    public function login(Request $request){

        //validasi data
        $request->validate([
            'email'  => 'required|email',
            'password'  => 'required'
        ]);

        //jwt and attempt
        $token = JWTAuth::attempt ([
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        if (!empty($token)){
            //response
            return response()->json([
            'status' => true,
            'message' => 'user login berhasil',
            'token' => $token
        ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'login gagal'
        ]);
    }

    //profile api (get)
    public function profile(){
        $userData = auth()->user();

        return response()->json([
            "status"    => true,
            "message"   => 'profil data',
            "user"      => $userData
        ]);
    }

    //refresh token api (get)
    public function refreshToken(){
        $newToken = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "new token telah dibuat",
            "token" => $newToken
        ]);
    }

    //logout api (get)
    public function logout(){
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "user berhasil logout"
        ]);
    }
}
