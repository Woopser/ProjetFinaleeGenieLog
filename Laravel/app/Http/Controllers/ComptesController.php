<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
