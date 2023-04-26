<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\userController;
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
})->name('login');
Route::middleware('auth:sanctum')->get('/home', [pageController::class, 'index']);
Route::get('/register', [pageController::class, 'showRegister'])->name('registerPage');
Route::post('/home', [authController::class, 'login'])->name('auth');
Route::post('/edit', [userController::class, 'edit'])->name('edit');
Route::post('/reg', [userController::class, 'register'])->name('register');
Route::get('/deleted', [userController::class, 'del'])->name('del');

// Route::get('/test', function () {
//     $user = User::findOrfail(2);
//     $user->delete();
//         return 'khara';
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


