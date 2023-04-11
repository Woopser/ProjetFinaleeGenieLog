
@extends('layouts.standard')
 

@section('titre', 'Création de campagne')
@section('contenu')

<form method="post" action="{{ route('campagnes.store')}}" class="d-flex justify-content-center"> 
    @csrf
    <div class="col-6">

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="nomCamp">Nom de la campagne :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nomCamp" name="nom">
            </div>
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateDeb">Date de début campagne :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateDeb" name="dateDebut">
            </div>
            
        </div>
    
        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateDeb">Date de début collecte de fond :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateDebFond" name="dateDebFond">
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateFinFond">Date de fin collecte de fond :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateRemiseFond" name="dateRemiseFond">
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateDeb">Date de fin de campagne :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateFin" name="dateFin">
            </div>
            
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger">Créer</button>
        </div>
    </div>

</form>
    




@endsection