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

                    }
                }
            }
        }
        
        



        return view('articles.index', compact('articles','campagnes'));
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
   

    public function store(Request $request)
    {
        $requestArticle = new ArticlesRequest();
        $validatedDataArticle = $requestArticle->validate();
        try{
            $article = new Article();
            $article->nom = $validatedDataArticle('nom')
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
            $campagnes = Campagne::where('enCours','=',true)->first();
            if(isset($campagnes)){
                $article->campagne_id = $campagne->id;
            }
            
            $article->save();
            return redirect()->route('comptes.index');
        }
        catch(Throwable $e){
            Log::debug($e);

        }
        return redirect()->route('comptes.index');
    }

     public function superStore(Request $request){
        $requestArticle = new ArticlesRequest();
        $validatedDataArticle = $requestArticle->validate();
        $requestArticle->nom = $request->nom;
        $requestArticle->image = $request->image;
        $request->prix = $request->prix;
        //store($requestArticle);
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
