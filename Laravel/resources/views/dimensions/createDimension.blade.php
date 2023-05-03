@extends('layouts.standard')
@section('titre', 'CreationDimension')
@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif

<div class="align-items-center marTop">
    <form class="d-flex justify-content-center" method="post" action="{{route('Dimensions.store')}}">
        @csrf
        <div class="col-6">
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nomArticle">La dimension </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="dimension" name="dimension" value="{{ old('dimension')}}">
                    <p id="errorDimension" class="erreur"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" id="bouton" class="btn btBleu whiteTxt">Créer</button>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/validationDimension.js') }}"></script>
@endsection