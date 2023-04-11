@extends('layouts.standard')

@section('titre', 'Creation Admin')

@section('contenu')
<div class="align-items-center">
<form class="d-flex justify-content-center" method="post" action="{{route('Comptes.storeAdmin')}}">
    @csrf
    <div class="col-6">

        
        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="prenomCompte">Prenom du professeur :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="prenomCompte" name="prenom">
            </div>
            
        </div>

        <div class="mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4 textForm" for="nomCompte">Nom du professeur :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nomCompte" name="nom">
            </div>
        </div>

        <div class=" mb-3 form-group row">
            <label style="color: rgb(8, 44, 115)" class="col-form-label col-sm-4" for="emailCompte">Email du professeur :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="emailCompte"  name="email">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-danger">Créer</button>
        </div>
    </div>
</form>
</div>
@endsection