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

<div class="align-items-center marTop">
<form class="d-flex justify-content-center" method="post" action="{{route('Comptes.storeClient')}}">
    @csrf
    <div class="col-6">

        
        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="prenomClient">Prenom du client :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="prenomClient" name="prenom">
                <p class="erreur" id="errorPrenom"></p>
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="nomClient">Nom du client :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nomClient" name="nom">
                <p class="erreur" id="errorNom"></p>
            </div>
        </div>

        <div class=" mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4" for="emailClient">Email du Client :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="emailClient"  name="email">
                <p class="erreur" id="errorEmail"></p>
            </div>
        </div>

        <div class=" mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4" for="password"> Mot de passe</label>
            <div class="col-sm-8">
             <input type="password" class="form-control" id="motDePasse" placeholder="Mot de passe du client" name="motDePasse" value="{{ old('motDePasse')}}"><br>
                <p class="erreur" id="errorMotDePasse"></p>
            </div>
        </div>


        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger">Créer</button>
        </div>
    </div>
</form>
</div>

<script src="{{ asset('js/validationClient.js') }}"></script>
@endsection