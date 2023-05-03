<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dimension;
use App\Http\Requests\DimensionsRequest;
use Illuminate\Support\Facades\Log;

class DimensionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dimensions = Dimension::all();
        return view('dimensions.index',compact('dimensions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dimensions.createDimension');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DimensionsRequest $request)
    {
        $dimension = new Dimension($request->all());
        $dimension -> save();
        return redirect()->route('Articles.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DimensionsRequest $request)
    {
        try{
            $dimension = Dimension::findOrFail($request->dimension_id);

            $dimension->dimension = $request->dimension;
    
            $dimension->save();
            return redirect()->route('Dimensions.index');
        }
        catch(\Throwable $e){
            Log::debug($e);
            return redirect()->route('Dimensions.index')->withErrors(['la modification n\'a pas fonctionné']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $dimension = Dimension::findOrFail($id);

            $dimension->articles()->detach();

            $dimension->delete();
            return redirect()->route('Dimensions.index');
        }
        catch(\Throwable $e){
            Log::debug($e);
            return redirect()->route('Dimensions.index')->withErrors(['La suppression n\'a pas fonctionné']);
        }
    }
}
