@extends('layouts.standard')
 

@section('titre', 'Accueil')
@section('contenu')

@foreach($campagnes as $campagne)
<h1 style="text-align: center">{{$campagne->nom}}</h1>
@endforeach
<div style="margin: 3%" class="row">
@foreach ($articles as $article)
  <form>
    <div class="card" style="width: 18rem">
        @if($article->image !=NULL)
        <img src="{{asset('img/articles/' . $article->image)}}" width="60%" height="60%" class="card-img-top" alt="Image non-disponible"/>
        @elseif($article->image == NULL)
        <img src="{{asset('img/articles/notFound.png')}}" width="60%" height="60%" class="card-img-top" alt="Image non-disponible"/>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$article->nom}}</h5>
          <p class="card-text">{{$article->prix}}$</p>
            <select class="form-select">
              @foreach($couleurs as $couleur)
                @foreach($couleur->couleurs as $coul)
                  <option style="background-color: #{{$coul->codeRGB}}; color: white;" class="dropdown-item">{{$coul->nom}}</option>
                @endforeach
              @endforeach
            </select>
            <select class="form-select">
              @foreach($dimensions as $dimension)
                @foreach($dimension->dimensions as $dimens)
                  <option class="dropdown-item">{{$dimens->dimension}}</option>
                @endforeach
              @endforeach
            </select>
            <!--Pour plus tard, mettre un select pour la quantité-->
            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
        </div>
      </div>
  </form>
@endforeach
</div>

@endsection