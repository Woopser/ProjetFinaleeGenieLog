<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CommandesController;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class CommandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try{

            $commandes = new Commande($request->all());
            $currentDate = date('Y-m-d');

            $count = 0;
            Log::debug($commandes->article_id);
            $commandos = Commande::where('compte_id', '=', Auth::id())->where('article_id','=',$commandes->article_id)->get();
            
            if(isset($commandos)){
                foreach($commandos as $commando)
                {
                    Log::debug('dans le foreach');
                    $count = $count +1;
                }
            }
            
                Log::debug($count);

            $articles = Article::where('id','=',$commandes->article_id)->get();
            Log::debug($articles);
            if(isset($articles))
            {
                foreach($articles as $article)
                {
                    Log::debug($request->nb_max);
                    if($count >= $article->nb_max)
                    {
                        //Cofde pour si ya trop d'article 
                    }
                    else
                    {
                        Log::debug('ici');
                        for($i = 0; $i < $request->nb_max; $i++)
                        {
                        $commandes2 = new Commande();
                        $currentDate = date('Y-m-d');
                        $commandes2->article_id = $request->article_id;
                        $commandes2->couleur_id = $request->couleur_id;
                        $commandes2->dimension_id = $request->dimension_id;
                        $commandes2->compte_id = Auth::id();
                        $commandes2->compte_id_modification = Auth::id();
                        $commandes2->dateCommande = $currentDate;
                        $commandes2->statu = 'Commandé';
                        $commandes2->save();
                        $count++;
                        }
                        

                    }
                }
            }
            

        }
        catch(Throwable $e){
            Log::debug($e);
        }
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
