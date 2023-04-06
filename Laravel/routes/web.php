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
Route::get('/login',[ComptesController::class, 'showLoginForm'])->name('login');

Route::POST('/login',[ComptesController::class, 'login'])->name('login');

Route::POST('/logout',[ComptesController::class, 'logout'])->name('logout');

Route::get('/comptes/creationAdmin',[ComptesController::class, 'createAdmin'])->name('Comptes.createAdmin');

Route::post('/comptes/storeAdmin',[ComptesController::class, 'storeAdmin'])->name('Comptes.storeAdmin');

