<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Campagne;
use App\Models\Couleur;
use App\Models\Dimension;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Support\Facades\Log;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $campagnes = Campagne::where('enCours','=',true)->get();
        if(isset($campagnes)){
            foreach($campagnes as $campagne){
                $articles = Article::where('campagne_id','=',$campagne->id)->get();
                
            }
        }
        $dimensions = Dimension::all();
        $couleurs = Couleur::all();

        if(isset($campagne)){
             return view('articles.index', compact('articles','campagnes','couleurs','dimensions'));
        }
        else{
            return view('Campagnes.noCampagne');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $couleurs = Couleur::all();
        $dimensions = Dimension::all();
        return view('articles.createArticle', compact('couleurs','dimensions'));
    }

    /**
     * Store a newly created resource in storage.
     */
   

    public function store(ArticlesRequest $request)
    {
        
        try{
            // validation
            $article = new Article();
            $article->nom = $request->nom;
            $article->prix = $request->prix;
            $article->nb_max = $request->nb_max;
            
            
            $uploadedFile = $request->file('image');
            if(isset( $uploadedFile)){
                $nomFichierUnique = str_replace(' ', '_', $article->nom). '-' . uniqid() . '.' . $uploadedFile->extension();
                try{
                    $request->image->move(public_path('img/articles'), $nomFichierUnique);
                }
                catch(\Symfony\Component\HttpFoundation\File\Exception\FileExeption $e){
                    Log::error("Erreur lors du téléversement du fichier.", [$e]);
                }
            $article->image = $nomFichierUnique;
            }
            //prendre le numero de campagne
            $campagne = Campagne::where('enCours','=',true)->first();
            if(isset($campagne)){
                $article->campagne_id = $campagne->id;
            }
            $article->save();
            
            //couleur management
            $couleurs = Couleur::all();
            foreach($couleurs as $couleur){
                //Log::debug($request->get($couleur->codeRGB));
                if($request->get($couleur->codeRGB) !== null){
                    if($article->couleurs->contains($couleur->id)){
                        Log::debug("La relation existe déjà");
                    }
                    else{
                        $article->couleurs()->attach($couleur->id);
                        $article->save();
                    }
                }
            }
            //Dimension management
            $dimensions = Dimension::all();
            foreach($dimensions as $dimension){
                //Log::debug($request->get($dimension->dimension));
                if($request->get($dimension->dimension) !== null){
                    if($article->dimensions->contains($dimension->id)){
                        Log::debug("La relation existe déjà");
                    }
                    else{
                        $article->dimensions()->attach($dimension->id);
                        $article->save();
                    }
                }
            }
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
    public function show(Article $article)
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
