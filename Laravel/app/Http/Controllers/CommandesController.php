<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CommandesController;
use App\Models\Commande;
use App\Models\Campagne;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Couleur;
use App\Models\Dimension;

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
    public function store(Request $request, string $id)
    {
        
        try{

            if(Auth::id() == null)
            {
                return view('commandes.showLoginForm'); 
            }
            else 
            {
                $commandes = new Commande($request->all());
                $currentDate = date('Y-m-d');
                
                $count = 0;
                Log::debug($id);
                $commandos = Commande::where('compte_id', '=', Auth::id())->where('article_id','=',$id)->get();
                
                if(isset($commandos)){
                    foreach($commandos as $commando)
                    {
                        Log::debug('dans le foreach');
                        $count = $count +1;
                    }
                }
                
                    Log::debug($count);

                $articles = Article::where('id','=',$id)->get();
                Log::debug($articles);
                if(isset($articles))
                {
                    foreach($articles as $article)
                    {
                        Log::debug($request->nb_max);
                        if($count >= $article->nb_max)
                        {
                            Log::debug('ICI');
                            return redirect()->back();
                            
                        }
                        else
                        {
                            Log::debug($request->nb_max);
                            for($i = 0; $i < $request->nb_max; $i++)
                            {
                            $commandes2 = new Commande();
                            $currentDate = date('Y-m-d');
                            $commandes2->article_id = $id;
                            Log::debug($request->campagne_id);
                            Log::debug('ici');
                            $commandes2->campagne_id = $request->campagne_id;
                            $commandes2->couleur_id = $request->couleur_id;
                            $commandes2->dimension_id = $request->dimension_id;
                            $commandes2->compte_id = Auth::id();
                            $commandes2->compte_id_modification = Auth::id();
                            $commandes2->dateCommande = $currentDate;
                            $commandes2->statu = 'Commandé';
                            $commandes2->save();
                            $count++;
                            }
                            return view('commandes.showLoginForm');

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

    public function showClient()
    {
        $commandes = Commande::where('compte_id', '=', Auth::id())->with(['articles','dimensions','couleurs'])->get();
        return view('Commandes.client', compact('commandes'));
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
        try{
            $commandes=Commande::findOrFail($id);
            $commandes->delete();

            return redirect()->route('Commande.client')->with('message', "Suppresion de commande)" . $commandes->id . "réussi!");
        }
        catch(\Throwable $e){
            Log::debug($e);
            return redirect()->route('Commande.client')->withErrors(['la suppression n\'a pas fonctionné']);
        }
        return redirect()->route('Commande.client');
    }
}
