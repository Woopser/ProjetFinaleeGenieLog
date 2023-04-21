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
<div class="align-items-center">
    <form class="d-flex justify-content-center" method="post" action="{{route('Article.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nomArticle">Nom de l'article :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom')}}">
                    <p id="errorNom" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="prixArticle">Prix :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="prix" name="prix" value="{{ old('prix')}}">
                    <p id="errorPrix" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="imageArticle">Image :</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image')}}">
                    <p id="errorImage" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nb_maxArticle">Nombre d'article maximun par personne :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nb_max" name="nb_max" value="{{ old('nb_max')}}">
                    <p id="errorNbMax" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <div class="col-6">
                    @foreach($couleurs as $couleur)
                    <div style="background-color: #{{$couleur->codeRGB}} " class="form-check">
                        <label style="color: white" class="form-check-label" for="flexCheckDefault">
                            {{$couleur->nom}}
                        </label>
                        <input class="form-check-input" type="checkbox" value="{{$couleur->id}}" id="couleur" name="{{$couleur->codeRGB}}">
                    </div>
                    @endforeach
                </div>
                <div class="col-6">
                    @foreach($dimensions as $dimension)
                    <div  class="form-check">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$dimension->dimension}}
                        </label>
                        <input class="form-check-input" type="checkbox" value="{{$dimension->id}}" id="couleur" name="{{$dimension->dimension}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger">Créer</button>
            </div>
        </div>
    </form>
</div>





<script src="{{ asset('js/validationArticle.js') }}"></script>
@endsection