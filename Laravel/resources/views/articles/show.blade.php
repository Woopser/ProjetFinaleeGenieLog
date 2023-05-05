@extends('layouts.standard')

@section('titre', 'Les Articles')

@section('contenu')

<h1 style="text-align: center">Les Articles</h1>
<div class="row">
@foreach($articles as $article)


<div class="col"> 
    <img src="{{asset('img/articles/' . $article->image)}}" width="60%" height="60%" class="card-img-top" alt="{{$article->nom}}">
    <p>{{$article->nom}}</p>
    <p>{{$article->prix}}</p>
    <p>{{$article->nb_max}}</p>
   
</div>

@endforeach
</div>
@endsection