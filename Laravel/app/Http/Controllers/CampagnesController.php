<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagne;
use App\Http\Requests\CampagnesRequest;

class CampagnesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campagnes = Campagne::all();
        return view('Campagne.index', compact('campagnes'));
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
        return redirect()->route('login');
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
}
