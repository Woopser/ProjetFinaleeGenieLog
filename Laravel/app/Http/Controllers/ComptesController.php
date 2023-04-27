<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Compte;
use App\Http\Requests\ComptesAdminRequest;
use App\Http\Requests\ComptesClientRequest;

class ComptesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('comptes.index');
    }



    public function showLoginForm()
    {
        return View('comptes.showLoginForm');
    }

    public function pageClient()
    {
        $comptes = Compte::where('typeCompte','=', 'Client')->get();
        return View('Comptes.pageClient', compact('comptes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    //public function show(string $id)
    //{
        //
   // }


    public function showAdmin()
    {
        $comptes = Compte::where('typeCompte','=', 'Admin')->get();
        return View('Comptes.showAdmin', compact('comptes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comptes = Compte::findOrFail($id);
        return View('Comptes.modifierClient', compact('comptes'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ComptesClientRequest $request,  $id)
    {
        try{
             $comptes = Comptes::findOrFail($id);
               //$comptes->prenom = $request->prenom;
              //$comptes->nom = $request->nom;
              //$comptes->email = $request->email;
              //$comptes->motDePasse = $request->motDePasse;
             
                //$comptes->save();
               return redirect()->route('comptes.index')->with('message', "Modification du client " . $comptes->nom . "réussi!");
               }
                catch(\Throwable $e){
              
              Log::debug($e);
                return redirect()->route('comptes.index')->withErrors(['la modification n\'a pas fonctionné']);
               }
                //return redirect()->route('comptes.index'); 
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $comptes=Compte::findOrFail($id);
            $comptes->delete();

            return redirect()->route('comptes.index')->with('message', "Suppresion du client)" . $comptes->prenom . "réussi!");
        }
        catch(\Throwable $e){
            Log::debug($e);
            return redirect()->route('comptes.index')->withErrors(['la suppression n\'a pas fonctionné']);
        }
        return redirect()->route('comptes.index');
    }




    public function login(Request $request)
    {
        $reussi=Auth::attempt(['email'=>$request->email,'motDePasse'=>$request->motDePasse]);

        if($reussi){
            return redirect()->route('films.index') ->with('message',"Connexion réussie");   
        }
            else{
                    return redirect()->route('login')->withErrors(['Informations invalides']); 
            }
    }


    public function createAdmin()
    {
        return View('comptes.createAdmin');
    }

   
    public function createClient()
    {
        return View('comptes.createClient');
    }

   
    public function storeAdmin(ComptesAdminRequest $request)
    {
        // sauvegarde d'admins dedans la base de données
        try{
            // création d'un mot de passe temporaire a partir ddes trois premières lettres du prenom nom et 123
            $motDePasse = substr($request->get('nom'),0,3) . substr($request->get('prenom'),0,3 . "123");
            // prend toute les données rentrez dedans le form
            $compte = new Compte($request->all());
            // cryption du mot de passe
            $compte->motDePasse = sha1($motDePasse);
            // ajout de type admin
            $compte->typeCompte = "Admin";
            // sauvegarde
            $compte->save();
            // redirection
            return redirect()->route('Comptes.createAdmin');
        }
        catch(Throwable $e){
            Log::debug($e);
        }
        
    }

    
    public function storeClient(ComptesClientRequest $request)
    {
    
        
        // Sauvegarder le client dans la base de données.
        try{
            
            // Prendre les données entrées dedans le form.
            $compte = new Compte($request->all());
            //$compte->motDePasse=Hash::make($request->motDePasse);
            // Encrypter le mot de passe.
            $compte->motDePasse = sha1($compte->motDePasse);
            // Ajouter le type Client au compte.
            $compte->typeCompte = "Client";
            // Sauvegarder le compte.
            $compte->save();
            // Redirection.
            return redirect()->route('Comptes.createClient');
        }
        catch(Throwable $e){
            Log::debug($e);
        }
        
    }

}
