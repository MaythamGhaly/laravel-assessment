<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class authController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
      
        $token = $user->createToken('personal')->plainTextToken;


        return response()->success('Login.', $token, 200);
    }
}
