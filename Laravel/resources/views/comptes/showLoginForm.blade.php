@extends('layouts.standard')
@section('titre', 'Connexion')
@section('contenu')





<div class="row">
    <div class="col-xl-4 offset-xl-4 login">
    <h1 > Veuillez vous connecter</h1>
    <form method="post" action="{{ route('login')}}">
    @csrf
    <div class="form-group" >

        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" placeholder="Email de l'usager" name="email" value="{{ old('email')}}"><br>

        <label  for="motDePasse">Mot de passe :</label>
        <input type="password" class="form-control" id="password" placeholder="Mot de passe de l'usager" name="password" value="{{ old('password')}}"><br><br>

    </div>
    
    <div class="row">
    <div class="col-xl-4 offset-xl-4 text-center">
        <!-- je sais pas pourquoi mais je suis pas capable de mettre la class -->
    <button type="submit" class="btn btBleu whiteTxt">Connexion</button>
    </div>
    </div>
   
     </form>

     </div>
     </div>



@endsection