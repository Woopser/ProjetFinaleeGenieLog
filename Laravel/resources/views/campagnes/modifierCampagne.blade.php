
@extends('layouts.standard')
 

@section('titre', 'Création de campagne')
@section('contenu')
@if(isset($errors) && $errors->any())

     <div class="alert alert-danger">

         @foreach($errors->all() as $error)

             <p>{{$error}}</p>

        @endforeach
    
    </div>
@endif

<form method="post" action="{{ route('Campagnes.update', [$campagnes->id])}}" class="d-flex justify-content-center marTop"> 
    @csrf
    <div class="col-6">

        <div class="mb-3 form-group row">
            <label  class="col-form-label col-sm-4 textForm " for="nomCamp">Nom de la campagne :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nomCamp" name="nom" value="{{ old('nom', $campagnes->nom)}}">
                <p id="nomErr" class="erreur"></p>
            </div>
        </div>

        <div class="mb-3 form-group row">
            <label  class="col-form-label col-sm-4 textForm" for="dateDeb">Date début campagne :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateDeb" name="dateDebut" value="{{ old('dateDebut', substr($campagnes->dateDebut,0,10))}}">
                <p id="dateDebErr" class="erreur"></p>
            </div>
            
        </div>
    
        <div class="mb-3 form-group row">
            <label  class="col-form-label col-sm-4 textForm" for="dateDeb">Date début collecte :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateDebFond" name="dateDebFond" value="{{ old('dateDebFond', substr($campagnes->dateDebFond,0,10))}}">
                <p id="dateDebFondErr" class="erreur"></p>
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label  class="col-form-label col-sm-4 textForm" for="dateFinFond">Date fin collecte :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateRemiseFond" name="dateRemiseFond" value="{{ old('dateRemiseFond', substr($campagnes->dateRemiseFond,0,10))}}">
                <p id="dateFinFondErr" class="erreur"></p>
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label  class="col-form-label col-sm-4 textForm" for="dateDeb">Date fin de campagne :</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="dateFin" name="dateFin" value="{{ old('dateFin', substr($campagnes->dateFin,0,10))}}">
                <p id="dateFinErr" class="erreur"></p>
            </div>
            
        </div>

        <div class="d-flex justify-content-center marTop">
            <button type="submit" class="btn btRouge">Modifier campagne</button>
        </div>


        <div class="d-flex justify-content-center marTop">
            <a href="{{ route('campagnes.finish', $campagnes->id) }}" class="btn btRouge">Fin de campagne</a>
        </div>



    </div>

    

</form>
    


<script src="{{asset('js/verificationCampagne.js')}}"></script>

@endsection