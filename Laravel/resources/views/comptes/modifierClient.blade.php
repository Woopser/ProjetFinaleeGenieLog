@extends('layouts.standard')

@section('titre', 'Creation Client')

@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif

<h1 class="text-center">Modification du client {{ $comptes->prenom }}</h1>
@if (isset($comptes))


<div class="align-items-center">
<form class="d-flex justify-content-center" method="post" action="{{route('Comptes.modifierClient', [$comptes->id])}}">
    @csrf
    <div class="col-6">

        
        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="prenomClient">Prenom du client :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenomClient" name="prenom" placeholder="Prenom du client" value="{{ old('prenom', $comptes->prenom)}}">
                <p class="erreur" id="errorPrenom"></p>
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="nomClient">Nom du client :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nomClient" name="nom" placeholder="Nom du client" value="{{ old('nom', $comptes->nom)}}">
                <p class="erreur" id="errorNom"></p>
            </div>
        </div>

        <div class=" mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4" for="emailClient">Email du Client :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="emailClient"  name="email" placeholder="Adresse courriel du client" value="{{ old('email', $comptes->email)}}">
                <p class="erreur" id="errorEmail"></p>
            </div>
        </div>

        <div class=" mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4" for="password"> Mot de passe</label>
            <div class="col-sm-8">
             <input type="password" class="form-control @error('motDePasse') is-invalid @enderror" id="motDePasse" placeholder="Mot de passe du client" name="motDePasse" value="{{ old('motDePasse', $comptes->motDePasse)}}"><br>
                <p class="erreur" id="errorMotDePasse"></p>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            

            <button type="submit" class="btn btn-danger">Enregistrer</button>
        </div>
    </div>
</form>
</div>
@endif


<script src="{{ asset('js/validationClient.js') }}"></script>

@endsection