<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [AuthController::class, 'root'])->name('root');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/booking/{id}', [AuthController::class, 'booking'])->name('booking');

Route::post('/askapi', [AuthController::class, 'askapi'])->name('askapi');

Route::get('/dark-mode', [AuthController::class, 'dark_mode'])->name('dark_mode');
// 


// booking