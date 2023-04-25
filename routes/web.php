<?php

use App\Http\Controllers\pageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test',  function(Request $request) {
$user = User::where('email', $request->input('email'))->first();
      
        $token = $user->createToken('personal');


        return response([
            'message' => 'Login.',
            'token' => $token,
            'user' => $user
        ], 200);
    });
Route::get('/', function () {
    return view('login');
});

Route::get('/register', [pageController::class, 'index'])->name('register');

