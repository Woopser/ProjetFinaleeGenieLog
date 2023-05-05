@extends('layouts.standard')

@section('titre', 'Creation Client')

@section('contenu')

<h1 style="text-align: center">Les Commandes</h1>

 @foreach ($commandes as $commande)
<div class="container text-center">
    <div class="row">
      <div class="col">
        {{$commande->articles->nom}}
      </div>
      <div class="col">
        {{$commande->dimensions->dimension}}
      </div>
      <div class="col">
        {{$commande->couleurs->nom}}
      </div>
      <div class="col">
        {{$commande->comptes->prenom}} 
        {{$commande->comptes->nom}}
      </div>
      <form method="post" action="{{route('Commandes.update', [$commande->id])}}">
      <div class="col">
        {{$commande->statu}}
      </div>
      {{-- <div class="col">
        {{$commande->campagne->nom}} sa marche pas parce que campagne_id est pas une foreign key
      </div> --}}
      <form method="post" action="{{ route('Commandes.destroy', [$commande->id]) }}" class="col">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
          </svg>
        </button>
    </form>
    </div>
  </div>

@endforeach 




@endsection