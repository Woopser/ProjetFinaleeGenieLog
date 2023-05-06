@extends('layouts.standard')

@section('titre', 'Les Commandes')

@section('contenu')

<h1 style="text-align: center">Les Commandes</h1>

 @foreach ($commandes as $commande)
<div class="container text-center">
    <div class="row">
      <div class="col" id="col">
        {{$commande->articles->nom}}
      </div>
      <div class="col" id="col">
        {{$commande->dimensions->dimension}}
      </div>
      <div class="col" id="col">
        {{$commande->couleurs->nom}}
      </div>
      <div class="col" id="col">
        {{$commande->comptes->prenom}} 
        {{$commande->comptes->nom}}
      </div>
    <form method="post" action="{{route('Commandes.update', [$commande->id])}}" class="col">
      @csrf
      <div class="col" id="col">
        <select class="form-select" aria-label="Default select example" name="statu">
          @if($commande->statu == "Commandé")
            <option value="{{$commande->statu}}" selected>{{$commande->statu}}</option>
          @elseif($commande->statu != "Commandé")
            <option value="Commandé">Commandé</option>
          @endif

          @if($commande->statu == "Payé")
            <option value="{{$commande->statu}}" selected>{{$commande->statu}}</option>
          @elseif($commande->statu != "Payé")
            <option value="Payé">Payé</option>
          @endif

          @if($commande->statu == "Reçu")
            <option value="{{$commande->statu}}" selected>{{$commande->statu}}</option>
          @elseif($commande->statu != "Reçu")
            <option value="Reçu">Reçu</option>
          @endif

        </select>
      </div>
      <button type="submit" class="btn"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
          <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
        </svg>
      </button>

    </form>
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