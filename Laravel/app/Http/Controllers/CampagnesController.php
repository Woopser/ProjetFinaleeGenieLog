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
        return view('campagnes.modifierCampagne',compact('campagnes'));
        
    } 

    

    /**
     * Update the specified resource in storage.
     */
    public function update(CampagnesRequest $request, string $id)
    {

        try{
            $campagnes = Campagne::findOrFail($id);
            $campagnes->nom = $request->nom;
            $campagnes->dateDebut = $request->dateDebut;
            $campagnes->dateDebFond = $request->dateDebFond;;
            $campagnes->dateRemiseFond = $request->dateRemiseFond;
            $campagnes->dateFin = $request->dateFin;
            $campagnes->save();
            return redirect()->route('Campagnes.index')->with('message', "Modification de la campagne " . $campagnes->nom . "réussi!");
            }
                catch(\Throwable $e){
              
              Log::debug($e);
                return redirect()->route('Campagnes.edit')->withErrors(['la modification n\'a pas fonctionné']);
               }
    }

 
    public function finish($id)
    {
        $campagnes = Campagne::findOrFail($id);
    
        if ($campagnes->date_fin < now()) {
            $campagnes->enCours = false;
            $campagnes->save();
    
            return redirect()->route('Campagnes.index')->with('success', 'Campagne terminée avec succès !');
        }
    
        return redirect()->route('Campagnes.index')->with('error', 'La date de fin de la campagne n\'est pas encore arrivée.');
    }








    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
