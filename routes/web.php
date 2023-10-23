<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowingController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::get('login', [AuthController::class, 'getLoginForm'])->name('auth.login.form');

Route::post('login', [AuthController::class, 'loginUser'])->name('auth.login');
Route::post('logout', [AuthController::class, 'logoutUser'])->name('auth.logout');


Route::get('register',[AuthController::class, 'getRegisterForm'])->name('auth.register.form');
Route::post('register',[AuthController::class, 'registerUser'])->name('auth.register');

Route::resource('/showings', ShowingController::class );
