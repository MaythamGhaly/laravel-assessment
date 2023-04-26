<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class pageController extends Controller
{
    public function showRegister()
    {
        $department = Department::all();
        $response['department'] = $department;
        return view('register', compact('response'));
    }
    public function index()
    {
        return 'hello';
    }
}
