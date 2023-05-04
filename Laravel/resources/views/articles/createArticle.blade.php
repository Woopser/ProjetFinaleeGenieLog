@extends('layouts.standard')

@section('titre', 'Creation Article')

@section('contenu')

@if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<script type="text/javascript">
    function ValidateForm(){
        var c = document.getElementsByTagName('input');
        let verificationCouleur = false;
        let verificationDimension = false;
        for(var i = 0; i<c.length;i++){
            if(c[i].type=='checkbox'){
                if(c[i].checked){
                    if(c[i].value=="couleur"){
                        verificationCouleur = true;
                    }
                    if(c[i].value=="dimension"){
                        verificationDimension = true;
                    }
                }
            }
        }
        if(verificationCouleur == true && verificationDimension == true){
            return true;
        }
        else{
            return false;
        }
    }
    
    function Validate(){
        if(!ValidateForm()){
            alert("Tu dois cocher une couleur(s) et une dimension(s)");
            return false;
        }
    }
    
</script>

<div class="align-items-center marTop">
    <form id="form" class="d-flex justify-content-center" method="post" action="{{route('Article.store')}}" enctype="multipart/form-data" onsubmit="return Validate();">
        @csrf
        <div class="col-6">
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nomArticle">Nom de l'article :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom')}}">
                    <p id="errorNom" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="prixArticle">Prix :</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix')}}">
                    <p id="errorPrix" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="imageArticle">Image :</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image')}}">
                    <p id="errorImage" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm" for="nb_maxArticle">Nombre d'article maximun par personne :</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="nb_max" name="nb_max" value="{{ old('nb_max')}}">
                    <p id="errorNbMax" class="erreur"></p>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <div class="col-6">
                    @foreach($couleurs as $couleur)
                    <div style="background-color: #{{$couleur->codeRGB}} " class="form-check">
                        <label  class="form-check-label whiteTxt" for="flexCheckDefault">
                            {{$couleur->nom}}
                        </label>
                        <input class="form-check-input" type="checkbox" value="couleur" id="couleur . {{$couleur->id}}" name="{{$couleur->codeRGB}}" >
                    </div>
                    @endforeach
                </div>
                <div class="col-6">
                    @foreach($dimensions as $dimension)
                    <div  class="form-check">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$dimension->dimension}}
                        </label>
                        <input class="form-check-input dimension" type="checkbox" value="dimension" id="dimension"  name="{{$dimension->dimension}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" id="bouton" class="btn btRouge">Créer</button>
            </div>
        </div>
    </form>
</div>





<script src="{{ asset('js/validationArticle.js') }}"></script>

@endsection