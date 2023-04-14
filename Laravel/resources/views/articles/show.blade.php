@extends('layouts.standard')
 

@section('titre', 'Accueil')
@section('contenu')


<h1>ARTICLES</h1>
@foreach ($articles as $article)

    <p>{{$article->nom}}</p>

@endforeach


@endsection