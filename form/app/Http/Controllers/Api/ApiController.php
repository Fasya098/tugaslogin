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
            'password'  => Hash::make ($request->password),
            'role_id'   => 2
        ]);

        //response
        return response()->json([
            'status' => true,
            'message' => 'akun user telah terbuat'
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

        $user = auth()->user();
    
            $role = $user->role_id; 
            if($role === 1){
                return response()->json([
                    'status' => true,
                    'user' => $user,
                    'token' => $token,
                    'message' => 'selamat datang admin',
                    'role' => $role
                ], 200);
            }elseif($role === 2){
                return response()->json([
                    'status' => true,
                    'user' => $user,
                    'token' => $token,
                    'message' => 'selamat datang user',
                    'role' => $role

                ], 200);
            } else {

        return response()->json([
            'status' => false,
            'message' => 'login gagal'
        ]);
    }
    }

    //lihat data
    public function show(){
        $input = User::all();

        return response()->json([
            'user'    => $input,
            'message' => 'User',
            'code' => 200
        ]);
    }
    
    public function getUser($id){
        $use = User::find($id);
        return response()->json($use);
    }

    public function updateData($id,  Request $request){
        $usr = User::where('id',$id)->first();
        $usr->name = $request->name;
        $usr->email = $request->email;
        $usr->save();
        //return response JSON user is created
        return response()->json([
            'success' => true,
            'user'    => $usr,
            'status' => 200,
            'message' => 'Successfully Edit Data' 
        ], 200);
    }

    //Hapus User
    public function deleteUser($id){
        $usr = User::find($id);
        if($usr){
            $usr->delete();
            return response()->json([
                'message' => "Data successfully deleted",
                'code' => 200
            ]);
        }else{
            return response([
                'message' => "Failed delete data $id / data doesn't exists"
            ]);
        }
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
