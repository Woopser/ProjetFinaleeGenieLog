
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
                <p id="nomErr" class="erreur"></p>
            </div>
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateDeb">Date début campagne :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateDeb" name="dateDebut">
                <p id="dateDebErr" class="erreur"></p>
            </div>
            
        </div>
    
        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateDeb">Date début collecte :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateDebFond" name="dateDebFond">
                <p id="dateDebFondErr" class="erreur"></p>
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateFinFond">Date fin collecte :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateRemiseFond" name="dateRemiseFond">
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="dateDeb">Date fin de campagne :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateFin" name="dateFin">
            </div>
            
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger">Créer</button>
        </div>
    </div>

    

</form>
    


<script src="{{asset('js/verificationCampagne.js')}}"></script>

@endsection