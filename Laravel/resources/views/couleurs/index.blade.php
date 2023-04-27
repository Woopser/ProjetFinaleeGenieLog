@extends('layouts.standard')
@section('titre', 'IndexCouleur')
@section('contenu')

<script>
    function id(){
        return document.getElementById('couleurId').value;
    }
</script>

<div class="align-items-center ">
    <div class="row d-flex justify-content-center">
        <div class="form-check col-4">
            <h2>Supprimer</h2>
        </div>
        <div class="form-check col-4">
             <h2>Modifier</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-6 d-flex justify-content-center">
            @foreach($couleurs as $couleur)
                <div class="row" style="color: {{$couleur->codeRGB}}">
                    <p>{{$couleur->nom}}</p>
                        <form id="formSupprimer" class="col-4" method="post" action="">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-center">
                                <button type="submit" id="bouton" class="btn btn-danger">supprimer</button>
                            </div>
                        </form>
                </div>
            @endforeach
        </div>
        <form id="formModifier"  class=" col-6" method="post" action="">
            @csrf
            <div class="mb-3 form-group row">
                <select class="form-select" name="couleur_id">
                    @foreach($couleurs as $couleur)
                        <option style="background-color: #{{$couleur->codeRGB}}; color: white;" value="{{$couleur->id}}" class="dropdown-item">{{$couleur->nom}}</option>
                    @endforeach
            </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" id="bouton" class="btn btn-danger">modifier</button>
            </div>
        </form>
    </div>
</div>


@endsection