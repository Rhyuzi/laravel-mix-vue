<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        // $user = User::where('username', $request->username)->first();
        // return response()->json($request->all(),200);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $response = [
                'error' => false,
                'message' => 'Login succes',
                'data' => User::where('username', $request->username)->first()
            ];

            return response()->json($response,200);
        }else{
            $response = [
                'error' => true,
                'message' => 'Username atau Password salah !',
                'data' => null
            ];

            return response()->json($response,200);
        }
    }
}
