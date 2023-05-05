@extends('layouts.standard')

@section('titre', 'Modification Admin')

@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif
<div class="align-items-center marTop">
    <form class="d-flex justify-content-center" method="post" action="{{route('Comptes.updateAdmin')}}">
        @csrf
        <div class="col-6">
            <div class="mb-3 form-group row">
                <label  class="col-form-label col-sm-4 textForm" for="prenomCompte">Prenom du professeur :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="prenomCompte" name="prenom" value="{{ $compte->prenom}}">
                    <p id="errorPrenom" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label  class="col-form-label col-sm-4 textForm" for="nomCompte" >Nom du professeur :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nomCompte" name="nom" value="{{ $compte->nom}}">
                    <p id="errorNom" class="erreur"></p>
                </div>
            </div>
            <div class=" mb-3 form-group row">
                <label  class="col-form-label col-sm-4" for="emailCompte">Mot de passe :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="password"  name="password" value="{{ old('password')}}">
                    <p id="errorPass" class="erreur"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btBleu">Modifier</button>
            </div>
        </div>
    </form>
    <form method="post" class="d-flex justify-content-center marTop" action="{{ route('comptes.destroyAdmin', [$compte->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btRouge">Supprimer compte</button>
    </form>
</div>

    <script src="{{ asset('js/validationModifAdmin.js') }}"></script>
@endsection