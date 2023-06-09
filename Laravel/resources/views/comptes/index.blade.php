@extends('layouts.standard')
@section('titre', 'Connexion')
@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif

<div class="location border-warning col-xl-12 marTop" id="home" >
    <div class="box my-5 col-xl-12">
    @if(count($comptes))
          @foreach($comptes as $compte)
          <a href="{{ route('usagers.index', [$usager]) }}">

        <div class=" ">
            <h5> Addresse Courriel </h5>
            <li>{{ $compte->email }}</li>
        </div>

        <div class=" ">
             <h5> Mot de passe </h5>
            <li>{{ $compte->motDePasse }}</li>
        </div>

    </div>
  </div>





