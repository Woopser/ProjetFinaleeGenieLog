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
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger">Créer</button>
            </div>
        </div>
    </form>
</div>






@endsection