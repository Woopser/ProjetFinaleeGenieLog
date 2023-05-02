<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Compte;
use App\Http\Requests\ComptesAdminRequest;
use App\Http\Requests\ComptesClientRequest;
use Illuminate\Support\Facades\Auth;

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
            $comptes = Compte::findOrFail($id);
            $comptes->prenom = $request->prenom;
            $comptes->nom = $request->nom;
            $comptes->email = $request->email;
            $comptes->motDePasse = $request->motDePasse;
            $comptes->save();
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
        $reussi = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);

        if($reussi){
            
            Log::debug(Auth::user()->typeCompte);
            return redirect()->route('Articles.index') ->with('message',"Connexion réussie");   
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
            $password = substr($request->get('nom'),0,3) . substr($request->get('prenom'),0,3) . '123';
            Log::debug($password);
            // prend toute les données rentrez dedans le form
            $compte = new Compte($request->all());
            // cryption du mot de passe
            $compte->password = Hash::make($password);
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
            $compte->password = Hash::make($compte->password);
            // Ajouter le type Client au compte.
            $compte->typeCompte = "Client";
            Log::debug($compte->password);
            // Sauvegarder le compte.
            $compte->save();
            // Redirection.
            return redirect()->route('Comptes.createClient');
        }
        catch(Throwable $e){
            Log::debug($e);
        }
        
    }



    public function showCommandes ()
    {
        // Récupère toutes les commandes du client
       $commandes = Commande::where('compte_id', Auth::id())->get(); 
        // Retournez la vue avec les commandes du client
     return view('comptes.pageClient', ['commandes' => $commandes]);

        if(isset($commandes)){

         foreach($commandes as $commande){
 
            $couleurs = Couleur::where('couleur_id','=',$couleur_id->id)->get();                   
            $dimensions = Dimension::where('dimension_id','=',$dimension_id->id)->get();
            $articles_id = Article_id::where('article_id','=',$article_id->id)->get();

                }

    }

    }

     //Logout
     public function logout()
     {
         Auth::logout();
         return redirect()->route('login')->with('message', 'Deconnecté');
     }


}
