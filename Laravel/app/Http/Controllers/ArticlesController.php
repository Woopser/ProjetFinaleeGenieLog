<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Campagne;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.createArticle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $article = new Article($request->all());
            $uploadedFile = $request->file('image');
            if(isset( $uploadedFile)){
                $nomFichierUnique = str_replace(' ', '_', $article->nom). '-' . uniqid() . '.' . $uploadedFile->extension();
                try{
                    $request->image->move(public_path('img/acteurs'), $nomFichierUnique);
                }
                catch(\Symfony\Component\HttpFoundation\File\Exception\FileExeption $e){
                    Log::error("Erreur lors du téléversement du fichier.", [$e]);
                }
            $article->image = $nomFichierUnique;
            }
            $campagnes = Campagne::where('enCours','=',true)->get();
            //if(isset($campagnes)){
                //foreach($campagnes as $campagne){
                    //$article->campagne_id = $campagnes->campagnes();
                //}
            //}
            
            $article->save();
            return redirect()->route('comptes.index');
        }
        catch(Throwable $e){
            Log::debug($e);

        }
        return redirect()->route('comptes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('articles.show', compact('article'));
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
