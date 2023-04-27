<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComptesController;
use App\Http\Controllers\CampagnesController;
use App\Http\Controllers\ArticlesController;

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



//Routes pour creation de campagnes
Route::get('/campagnes/creation',
[CampagnesController::class, 'create'])->name('Campagnes.create');
Route::post('/campagne/store',
[CampagnesController::class, 'store'])->name('campagnes.store');
//route pour page 404
Route::get('campagne/notfound',
[CampagnesController::class, 'showNotFound'])->name('Campagne.noCampagne');

/*  Connection Comptes*/
Route::get('/',[ComptesController::class, 'showLoginForm'])->name('comptes.index');
Route::get('/login',[ComptesController::class, 'showLoginForm'])->name('comptes.index');
Route::POST('/login',[ComptesController::class, 'login'])->name('login');
Route::POST('/logout',[ComptesController::class, 'logout'])->name('logout');


//Route pour la creation d'admin
Route::get('/comptes/creationAdmin',[ComptesController::class, 'createAdmin'])->name('Comptes.createAdmin');
//Route pour sauvegarder les admins
Route::post('/comptes/storeAdmin',[ComptesController::class, 'storeAdmin'])->name('Comptes.storeAdmin');

//Route pour la creation de client
Route::get('/comptes/creationClient',[ComptesController::class, 'createClient'])->name('Comptes.createClient');
//Route pour sauvegarder le client
Route::post('/comptes/storeClient',[ComptesController::class, 'storeClient'])->name('Comptes.storeClient');

//Route pour ajouter un article
Route::get('/articles/create',[ArticlesController::class, 'create'])->name('Articles.create');
Route::post('/articles/store',[ArticlesController::class, 'store'])->name('Article.store');
Route::post('/articles/superStore',[ArticlesController::class,'superStore'])->name('Article.superStore');

//Juste la route pour la page principale


//Supprimer un client
Route::delete('/comptes/{id}',
[ComptesController::class, 'destroy'])->name('comptes.destroy');


Route::get('/compte/afficherClient',[ComptesController::class, 'pageClient'])->name('comptes.pageClient');


// Modifier un comptes client
Route::get('/comptes/edit/{id}',
[ComptesController::class, 'edit'])->name('Comptes.edit');

Route::POST('/comptes/{id}/modifierClient/' ,
[ComptesController::class, 'update'])->name('Comptes.modifierClient');






//Afficher les admins
Route::get('/comptes/showAdmin' ,
[ComptesController::class, 'showAdmin'])->name('Comptes.showAdmin');

Route::get('articles/index',[ArticlesController::class, 'index'])->name('Articles.index');

