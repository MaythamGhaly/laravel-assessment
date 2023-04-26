<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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
            
            Session::flash('error', 'User not found.');
            return redirect(route('login'));
        }
       
        if (!Auth::attempt($request->only('email', 'password'))) {
            Session::flash('error', 'password is incorrect.');
            return redirect(route('login'));
        }

        $token = $user->createToken('personal')->plainTextToken;
        $department = Department::all();
        $response['department'] = $department;
        $response['user'] = $user;
        $response['token'] = $token;
       

        return view('home',compact('response'));
    }
}
