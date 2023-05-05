<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CampagnesRequest;

class CampagnesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campagnes = Campagne::all();
        return view('Campagnes.index', compact('campagnes'));
    }

    /**
     * campagne pas trouver
     */
    public function showNotfound()
    {
        return view('campagne.noCampagne');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campagnes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampagnesRequest $request)
    {
        try{
            $campagne = new Campagne($request->all());
            $campagne->enCours = true;
            $campagne->save();
        }
        catch (\Throwables $e){
            Log::debug($e);

        }
        return redirect()->route('Campagnes.index');
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
    public function edit()
    {
        $campagnes = Campagne::where('enCours','=',true)->first();
        Log::debug($campagnes->id);
        $idd = $campagnes->id;
        return redirect()->route('Campagnes.update', compact('campagnes', string($idd)));
        
    } 

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Log::debug("J'entre");
        try{
            $campagnes = Campagne::findOrFail($campagnes->id);
            $campagnes->nom = $request->nom;
            $campagnes->dateDeb = $request->dateDeb;
            $campagnes->dateDebFond = $request->dateDebFond;
            $campagnes->dateRemiseFond = $request->dateRemiseFond;
            $campagnes->dateFin = $request->dateFin;
            $campagnes->save();
            return redirect()->route('campagnes.index')->with('message', "Modification de la camapagne " . $campagnes->nom . "réussi!");
            }
                catch(\Throwable $e){
              
              Log::debug($e);
                return redirect()->route('campagnes.index')->withErrors(['la modification n\'a pas fonctionné']);
               }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
