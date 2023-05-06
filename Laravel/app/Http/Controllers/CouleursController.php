<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Couleur;
use App\Http\Requests\CouleursRequest;
use Illuminate\Support\Facades\Log;

class CouleursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleurs = Couleur::all();
        return view('couleurs.index', compact('couleurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('couleurs.createCouleur');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouleursRequest $request)
    {
        $couleur = new Couleur($request->all());
        $couleur->save();
        return redirect()->back();
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
    public function update(CouleursRequest $request)
    {
        try{
            $couleur = Couleur::findOrFail($request->couleur_id);

            $couleur->nom = $request->nom;
            $couleur->codeRGB = $request->codeRGB;

            $couleur->save();
            return redirect()->route('Couleurs.index');
        }
        catch(\Throwable $e){
            Log::debug($e);
            return redirect()->route('Couleurs.index')->withErrors(['la modification n\'a pas fonctionné']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $couleur = Couleur::findOrFail($id);

            $couleur->articles()->detach();

            $couleur->delete();
            return redirect()->route('Couleurs.index');
        }
        catch(\Throwable $e){
            Log::debug($e);
            return redirect()->route('Couleurs.index')->withErrors(['La suppression n\'a pas fonctionné']);
        }
    }

    
}
