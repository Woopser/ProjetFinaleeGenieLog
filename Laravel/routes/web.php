<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComptesController;
use App\Http\Controllers\CampagnesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CouleursController;
use App\Http\Controllers\DimensionsController;
use App\Http\Controllers\CommandesController;
use App\Http\Middleware\CheckRole;


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





//Route pour le superAdmin
Route::middleware(['CheckRole:SuperAdmin'])->group(function () 
{
    //Route pour la creation d'admin
    Route::get('/comptes/creationAdmin',[ComptesController::class, 'createAdmin'])->name('Comptes.createAdmin');
    //Route pour sauvegarder les admins
    Route::post('/comptes/storeAdmin',[ComptesController::class, 'storeAdmin'])->name('Comptes.storeAdmin');
    //liste admin
    Route::get('/comptes/showAdmin' ,[ComptesController::class, 'showAdmin'])->name('Comptes.showAdmin');
    //supprimer admin
    Route::delete('/comptes/{id}/destoy',[ComptesController::class, 'destroy'])->name('Comptes.destroyAdminSuper');
});

//Route pour admins
Route::middleware(['CheckRole:Admin'])->group(function () 
{
    //comptes
    //Route pour modification d'admin
    Route::get('/comptes/editAdmin',[ComptesController::class, 'editAdmin'])->name('Comptes.editAdmin');
    Route::post('/comptes/editAdmin',[ComptesController::class, 'editAdmin'])->name('Comptes.editAdmin');
    Route::post('/comptes/updateAdmin',[ComptesController::class, 'updateAdmin'])->name('Comptes.updateAdmin');
    //route pour delete admin
    
    //=================================================================================================================
    //Routes pour creation de campagnes
    Route::get('/campagnes/creation',[CampagnesController::class, 'create'])->name('Campagnes.create');
    Route::post('/campagne/store',[CampagnesController::class, 'store'])->name('campagnes.store');
    //Route pour CRUD campagne
    Route::get('/campagnes/{id}/edit',[CampagnesController::class, 'edit'])->name('campagnes.edit');
    Route::put('/campagnes/{id}' ,[CampagnesController::class, 'update'])->name('campagnes.update');
    Route::get('/campagnes/index',[CampagnesController::class,'index'])->name('Campagnes.index');
    //=================================================================================================================
    //Article
    //Route pour ajouter un article
    Route::get('/articles/create',[ArticlesController::class, 'create'])->name('Articles.create');
    Route::post('/articles/store',[ArticlesController::class, 'store'])->name('Article.store');
    Route::post('/articles/superStore',[ArticlesController::class,'superStore'])->name('Article.superStore');
    //==================================================================================================================
    //Couleur
    //Route créer une couleur
    Route::get('/couleurs/create',[CouleursController::class, 'create'])->name('Couleurs.create');
    //Route pour la sauvegarde d'une couleur
    Route::POST('/couleurs/store',[CouleursController::class, 'store'])->name('Couleurs.store');
    //Route modifier couleur
    Route::POST('/couleurs/update',[CouleursController::class, 'update'])->name('Couleurs.update');
    //Route index couleur
    Route::get('/couleurs/index',[CouleursController::class, 'index'])->name('Couleurs.index');
    Route::POST('/couleurs/index',[CouleursController::class, 'index'])->name('Couleurs.index');
    //Route destroy couleurs
    Route::delete('/couleurs/{id}/destroy',[CouleursController::class, 'destroy'])->name('Couleurs.destroy');
    //==================================================================================================================
    //Dimension
    //Route créer une dimension
    Route::get('/dimensions/create',[DimensionsController::class, 'create'])->name('Dimensions.create');
    //Route pour la sauvegarde d'une couleur
    Route::POST('/dimensions/store',[DimensionsController::class, 'store'])->name('Dimensions.store');
    //Route pour lindex des dimensions
    Route::get('/dimension/index',[DimensionsController::class, 'index'])->name('Dimensions.index');
    Route::POST('/dimension/index',[DimensionsController::class, 'index'])->name('Dimensions.index');
    //Route pour modifier une dimension
    Route::POST('/dimension/update',[DimensionsController::class, 'update'])->name('Dimensions.update');
    //Route pour modifier une dimension
    Route::delete('/dimensions/{id}/destroy',[DimensionsController::class, 'destroy'])->name('Dimensions.destroy');
    //===================================================================================================================
    //Voir les commandes 
    Route::get('/commandes/admin',[CommandesController::class, 'showAdmin'])->name('Commandes.admin');
    //modifier les ommandes
    Route::POST('/commandes/{id}/update',[CommandesController::class, 'update'])->name('Commandes.udpate');
});

//Route pour les clients seulement
Route::middleware(['CheckRole:Client'])->group(function () 
{
    // Modifier un comptes client
    Route::get('/comptes/{id}/edit',[ComptesController::class, 'edit'])->name('Comptes.edit');
    Route::POST('/comptes/{id}/modifierClient/' ,[ComptesController::class, 'update'])->name('Comptes.modifierClient');

    //Supprimer un client
    Route::delete('/comptes/{id}',[ComptesController::class, 'destroy'])->name('comptes.destroy');

    
});

//Route pour admin et clients
Route::middleware(['CheckRole:Client,Admin'])->group(function () 
{
    Route::get('/compte/afficherClient',[ComptesController::class, 'pageClient'])->name('comptes.pageClient');
    //Commande

    //Route pour store les commandes

    //Route pour store les commadnes


    Route::POST('/commande/{id}/store',[CommandesController::class, 'store'])->name('Commandes.store');

    Route::get('compte/pageClient', [ComptesController:: class,'showCommandes'])->name('comptes.pageClient');

    //Voir les commandes 
    Route::get('/commandes/client',[CommandesController::class, 'showClient'])->name('Commande.client');
    //Supprimer une commmandes
    Route::delete('/commandes/{id}',[CommandesController::class, 'destroy'])->name('Commandes.destroy');
});

//Route pour tous, incluant les non connecté
//route pour page 404
Route::get('campagne/notfound',[CampagnesController::class, 'showNotFound'])->name('Campagne.noCampagne');
//Route de lindex d'article
Route::get('Article/index',[ArticlesController::class, 'index'])->name('Articles.index');
/*  Connection Comptes*/
Route::get('/',[ComptesController::class, 'showLoginForm'])->name('comptes.index');
Route::get('/login',[ComptesController::class, 'showLoginForm'])->name('comptes.index');
Route::POST('/login',[ComptesController::class, 'login'])->name('login');
Route::POST('/logout',[ComptesController::class, 'logout'])->name('logout');
//Route de la creation de compte client
Route::get('/comptes/createClient', [ComptesController::class, 'createClient'])->name('Comptes.createClient');
Route::post('/comptes/storeClient', [ComptesController::class, 'storeClient'])->name('Comptes.storeClient');





//Route::delete('/comptes/{id}/destoy',[ComptesController::class, 'destroy'])->name('Comptes.destroyAdminSuper');
//Route::delete('/comptes/{id}/destoy',[ComptesController::class, 'destroy'])->name('comptes.destroyAdmin');



