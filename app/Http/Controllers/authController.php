<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'string|required',
            'password' => 'string|required',
        ]);
        $user = User::where('email', $request->email)->first();
        
        if (empty($user)) {
            return response(['message' => 'Email is invalid.']);
        }
       
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message'=> 'Password is invalid.',
            ]);
        }
      
        $token = $user->createToken('personal')->plainTextToken;

        $response['user'] = $user;
        $response['token'] = $token;


        return response()->json($response);
    }
}
