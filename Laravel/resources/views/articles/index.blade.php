@extends('layouts.standard')
 

@section('titre', 'Accueil')
@section('contenu')


<h1 style="text-align: center">Nom de campagne ici</h1>
<div style="margin: 3%" class="row">
@foreach ($articles as $article)


    <div class="card" style="width: 18rem">
        @if($article->image !=NULL)
        <img src="{{asset('img/articles/' . $article->image)}}" width="60%" height="60%" class="card-img-top" alt="Image non-disponible"/>
        @elseif($article->image == NULL)
        <img src="{{asset('img/articles/notFound.png')}}" width="60%" height="60%" class="card-img-top" alt="Image non-disponible"/>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$article->nom}}</h5>
          <p class="card-text">{{$article->prix}}$</p>
          <a href="#!" class="btn btn-primary">Ajouter au panier</a>
        </div>
      </div>
@endforeach
</div>

@endsection