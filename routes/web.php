<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::view('admin', 'admin');
// Route::get('admin', [UserController::class, 'admin'])->name('admin');
// Route::post('admin', [UserController::class, 'adminPage'])->name('admin.login');

// Route::get('/home', [UserController::class, 'home']);


///////////////////////////////// AUTH //

// Route::get('/login', [UserController::class, 'login'])->name('login');
Route::view('login', 'login')->name('login');
Route::post('login', [UserController::class, 'login'])->name('loginMatch');


// Route::get('register', [UserController::class, 'Register'])->name('get.Register');
Route::view('register', 'register')->name('get.Register');
Route::post('register', [UserController::class, 'register'])->name('saveRegister');

Route::get('dashboard', [UserController::class, 'dashboardPage'])->name('dashboard');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
