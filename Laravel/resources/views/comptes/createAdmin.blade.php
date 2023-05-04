@extends('layouts.standard')

@section('titre', 'Creation Admin')

@section('contenu')

@if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<div class="align-items-center marTop">
<form class="d-flex justify-content-center" method="post" action="{{route('Comptes.storeAdmin')}}">
    @csrf
    <div class="col-6">

        
        <div class="mb-3 form-group row">
            <label  class="col-form-label col-sm-4 textForm" for="prenomCompte">Prenom du professeur :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="prenomCompte" name="prenom" value="{{ old('prenom')}}">
                <p id="errorPrenom" class="erreur"></p>
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label class="col-form-label col-sm-4 textForm" for="nomCompte" >Nom du professeur :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nomCompte" name="nom" value="{{ old('nom')}}">
                <p id="errorNom" class="erreur"></p>
            </div>
        </div>

        <div class=" mb-3 form-group row">
            <label class="col-form-label col-sm-4" for="emailCompte">Email du professeur :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="emailCompte"  name="email" value="{{ old('email')}}">
                <p id="errorEmail" class="erreur"></p>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btBleu">Créer</button>
        </div>
    </div>
</form>
</div>

<script src="{{ asset('js/verificationAdminJs.js') }}"></script>
@endsection