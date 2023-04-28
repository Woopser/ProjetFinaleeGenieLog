@extends('layouts.standard')
@section('titre', 'IndexCouleur')
@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif

<div class="align-items-center ">
    <div class="row d-flex justify-content-center">
        <div class="form-check col-5">
            <h2>Supprimer</h2>
        </div>
        <div class="form-check col-3 col-xl-1">
             <h2>Modifier</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            @foreach($couleurs as $couleur)
                <div class="row" >
                    <div class="col-10" style="background-color:  #{{$couleur->codeRGB}}">
                    <p style="color: white">{{$couleur->nom}}</p>
                    </div>
                    <div class="col-2">
                        <form id="formSupprimer" class="col-4" method="post" action="{{route('Couleurs.destroy', [$couleur->id])}}">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-center">
                                <button type="submit" id="bouton" class="btn btn-danger">X</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <form id="formModifier"  class=" col-5" method="POST" action="{{route('Couleurs.update')}}">
            @csrf
            
            <div class="mb-3 form-group row">
                <label class="form-check-label col-sm-4">Couleur à modifier</label>
                <div class="col-sm-8">
                    <select class="form-select" name="couleur_id">
                        @foreach($couleurs as $couleur)
                            <option style="background-color: #{{$couleur->codeRGB}}; color: white;" value="{{$couleur->id}}" class="dropdown-item">{{$couleur->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nomArticle">Nom :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom')}}">
                    <p id="errorNom" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nomArticle">Code hexadecimal :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="codeRGB" name="codeRGB" value="{{ old('codeRGB')}}">
                    <p id="errorCodeRGB" class="erreur"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" id="bouton" class="btn btn-primary">modifier</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/validationCouleur.js') }}"></script>
@endsection