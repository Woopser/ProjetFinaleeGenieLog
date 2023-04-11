<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Http\Requests\ComptesAdminRequest;

class ComptesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('comptes.index');
    }

    public function showLoginForm()
    {
        return View('comptes.showLoginForm');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function login(Request $request)
    {
        $reussi=Auth::attempt(['email'=>$request->email,'motDePasse'=>$request->motDePasse]);

        if($reussi){
            return redirect()->route('films.index') ->with('message',"Connexion réussie");   
        }
            else{
                    return redirect()->route('login')->withErrors(['Informations invalides']); 
            }
    }


    public function createAdmin()
    {
        return View('comptes.createAdmin');
    }

    public function storeAdmin(ComptesAdminRequest $request)
    {
        // sauvegarde d'admins dedans la base de données
        try{
            // création d'un mot de passe temporaire a partir ddes trois premières lettres du prenom nom et 123
            $motDePasse = substr($request->get('nom'),0,3) . substr($request->get('prenom'),0,3 . "123");
            // prend toute les données rentrez dedans le form
            $compte = new Compte($request->all());
            // cryption du mot de passe
            $compte->motDePasse = sha1($motDePasse);
            // ajout de type admin
            $compte->typeCompte = "Admin";
            // sauvegarde
            $compte->save();
            // redirection
            return redirect()->route('Comptes.createAdmin');
        }
        catch(Throwable $e){
            Log::debug($e);
        }
        
    }

}
