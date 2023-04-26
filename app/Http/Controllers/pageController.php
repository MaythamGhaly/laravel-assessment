<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    public function index()
    {
        return 'hello';
    }
}
