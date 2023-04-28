@extends('layouts.standard')
@section('titre', 'CreationCouleur')
@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif

<div class="align-items-center">
    <form class="d-flex justify-content-center" method="post" action="{{route('Couleurs.store')}}">
        @csrf
        <div class="col-6">
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nomArticle">Nom de la couleur :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom')}}">
                    <p id="errorNom" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nomArticle">Code hexadecimal de la couleur :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="codeRGB" name="codeRGB" value="{{ old('codeRGB')}}">
                    <p id="errorCodeRGB" class="erreur"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" id="bouton" class="btn btn-danger">Créer</button>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/validationCouleur.js') }}"></script>
@endsection