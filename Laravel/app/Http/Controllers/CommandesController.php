<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        /*try{

            $commandes = new Commande($request->all());
            $currentDate = date('Y-m-d');

            $count = 0;
            $commandos = Commande::where('compte_id', '=', 'INSERRER LA VARIABLDE DE SESSION ICI')->where('article_id','=',$commandes->article_id)->get();
            
            foreach($commandos as $commando)
                {
                    if(isset($commandos))
                    {
                        $count += $count;
                    }   
                }

            $articles = Article::where('article_id','=',$commandes->article_id)->first();
            //LA IL FAUT LE FOREACH ET LE ISSET DE $ARTICLES POOUR ALLER CHERCHER LE NB_MAX POUR POUVOIR VOIR SI LE GARS DEPASSE 
            

        }
        catch(Throwable $e){
            Log::debug($e);
        }*/
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
