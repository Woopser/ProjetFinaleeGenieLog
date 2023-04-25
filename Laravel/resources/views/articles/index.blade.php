@extends('layouts.standard')
 

@section('titre', 'Accueil')
@section('contenu')

@foreach($campagnes as $campagne)
<h1 style="text-align: center">{{$campagne->nom}}</h1>
@endforeach
<div style="margin: 3%" class="row">
@foreach ($articles as $article)
  <form method="POST" action="{{route('commandes.store')}}">
    @csrf
    <div class="card" style="width: 18rem">
        @if($article->image !=NULL)
        <img src="{{asset('img/articles/' . $article->image)}}" width="60%" height="60%" class="card-img-top" alt="Image non-disponible"/>
        @elseif($article->image == NULL)
        <img src="{{asset('img/articles/notFound.png')}}" width="60%" height="60%" class="card-img-top" alt="Image non-disponible"/>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$article->nom}}</h5>
          <p class="card-text">{{$article->prix}}$</p>

            <label for="couleur_id">Couleur: </label>
            <select class="form-select" name="couleur_id">
              @foreach($couleurs as $couleur)
                @foreach($couleur->couleurs as $coul)
                  <option style="background-color: #{{$coul->codeRGB}}; color: white;" value="{{$coul->id}}" class="dropdown-item">{{$coul->nom}}</option>
                @endforeach
              @endforeach
            </select>

            <label for="dimension_id">Dimension: </label>
            <select class="form-select" name="dimension_id">
              @foreach($dimensions as $dimension)
                @foreach($dimension->dimensions as $dimens)
                  <option class="dropdown-item" value="{{$dimens->id}}">{{$dimens->dimension}}</option>
                @endforeach
              @endforeach
            </select>

            <label for="nb_max">Quantité: </label>
            <select class="form-select" name="nb_max">
              @for ($i = $article->nb_max; $i > 0; $i-- )
              <option class="dropdown-item" value="{{$i}}">{{$i}}</option>
              @endfor
            </select>
            <!--Pour plus tard, mettre un select pour la quantité-->
            <button type="submit" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
            </button>
        </div>
      </div>
  </form>
@endforeach
</div>

@endsection