<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComptesController;
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

Route::get('/login',
[ComptesController::class, 'index'])->name('Comptes.index');

/*  Connection usager  Connection usager  Connection usager  Connection usager  Connection usager  Connection usager  Connection usager Connection usager Connection usager*/
Route::get('/login',
[usagersController::class, 'showLoginForm'])->name('login');

Route::POST('/login',
[usagersController::class, 'login'])->name('login');

Route::POST('/logout',
[usagersController::class, 'logout'])->name('logout');
