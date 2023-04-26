<?php

use App\Http\Controllers\authController;
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
Route::get('/', function () {
    return view('login');
});
Route::middleware('auth:sanctum')->get('/home', [pageController::class, 'index']);
Route::get('/register', [pageController::class, 'showRegister'])->name('register');
Route::post('/login', [authController::class, 'login']);
Route::get('/token', function () {
    return csrf_token(); 
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


