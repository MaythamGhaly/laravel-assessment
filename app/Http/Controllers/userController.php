<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\Hash;
use Illuminate\Support\Facades\Session;


class userController extends Controller
{
    public function edit(Request $request)
    {
        $user = User::findOrfail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->gender = $request->gender;
        $user->department_id = $request->get('department_id');
        $user->save();

        $department = Department::all();
        $response['department'] = $department;
        $response['user'] = $user;

        Session::flash('success', 'User updated successfully.');
        return view('home', compact('response'));
    }


    public function register(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->phone_number = $request->phone_number;
        $user->department_id = $request->get('department_id');
        $user->gender = $request->gender;

        $user->save();

        return view('login');
    }

    public function del()
    {
        $user = User::find(Auth::user()->id);

       
        $user->delete();
        
        if ($user->delete()) {
            Auth::logout();
            return Redirect(route('login'));
        }
    }
}
