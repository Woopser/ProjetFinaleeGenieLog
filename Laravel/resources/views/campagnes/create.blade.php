@extends('layouts.standard')


@section('titre', 'Création de campagne')
@section('contenu')

<form method="post" action="{{ route('campagnes.store')}}"> 
    @csrf
    <div class="mb-3">
        <label for="dateDeb" class="form-label">Veuillez entrez la date de debut de la campagne</label>
        <input type="date" class="form-control" id="dateDeb">
    </div>

    <div class="mb-3">
        <label for="dateFin" class="form-label">Veuillez entrez la date de fin de la campagne</label>
        <input type="date" class="form-control" id="dateFin">
    </div>

    <div class="mb-3">
        <label for="dateFin" class="form-label">Veuillez entrez la date de fin de collecte de fonds</label>
        <input type="date" class="form-control" id="dateFin">
    </div>

</form>
    




@endsection