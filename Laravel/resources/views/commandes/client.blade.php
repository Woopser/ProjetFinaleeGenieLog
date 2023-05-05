@extends('layouts.standard')

@section('titre', 'Creation Client')

@section('contenu')


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
      {{-- <div class="col">
        {{$commande->campagne->nom}} sa marche pas parce que campagne_id est pas une foreign key
      </div> --}}
    </div>
  </div>

  <form method="post" action="{{ route('Commandes.destroy', [$commande->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer compte</button>
</form>
@endforeach




@endsection