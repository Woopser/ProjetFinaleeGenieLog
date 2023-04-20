<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Campagne;
use App\Models\Couleur;
use App\Models\Dimension;
use App\Http\Requests\ArticlesRequest;

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
                if(isset($articles)){
                    foreach($articles as $article){
                        $couleurs = Article::with('couleurs')->get();
                        $dimensions = Article::with('dimensions')->get();
                    }
                }
            }
        }
        
        



        return view('articles.index', compact('articles','campagnes','couleurs','dimensions'));
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
    public function store(ArticlesRequest $request)
    {
        try{
            $article = new Article($request->all());
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
            $campagnes = Campagne::where('enCours','=',true)->get();
            if(isset($campagnes)){
                foreach($campagnes as $campagne){
                    $article->campagne_id = $campagne->id;
                }
                
            }
            
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
