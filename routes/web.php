<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;


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
// Route::get('/test', function () {
//     $tickets = App\Models\Ticket::orderBy('purchased_at','desc')->limit(4)->get();
//     // Illuminate\Support\Facades\Mail::to('test@test.com')->send(new App\Mail\TicketSold('Kwaku Mensah',$tickets));
//     return new App\Mail\TicketSold('Test User',$tickets);
// });

Route::redirect('/', 'home');
Route::get('home', [ShowingController::class,'index'])->name('home');

Route::get('login', [AuthController::class, 'getLoginForm'])->name('auth.login.form')->middleware('guest');

Route::post('login', [AuthController::class, 'loginUser'])->name('auth.login')->middleware('guest');
Route::post('logout', [AuthController::class, 'logoutUser'])->name('auth.logout')->middleware('auth');


Route::get('register',[AuthController::class, 'getRegisterForm'])->name('auth.register.form')->middleware('guest');
Route::post('register',[AuthController::class, 'registerUser'])->name('auth.register')->middleware('guest');


Route::get('admin/login', [AuthController::class, 'getLoginForm'])->middleware('guest');  
Route::prefix('/admin')->middleware(['auth','admin'])->group(function() {
    Route::resource('showings', ShowingController::class );
    Route::resource('movies', MovieController::class );
    Route::resource('/tickets', TicketController::class );
});

Route::post('showings/{showing}/buy', [ShowingController::class, 'buyTicket'])->name('tickets.buy')->middleware('auth');
Route::get('showings/{showing}', [ShowingController::class, 'show'])->name('showings.view');

Route::get('ticket-verify/{id}', [TicketController::class,'verify'])->name('verify.ticket');




