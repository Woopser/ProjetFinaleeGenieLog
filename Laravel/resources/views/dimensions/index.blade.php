@extends('layouts.standard')
@section('titre', 'indexDimension')
@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif

<div class="align-items-center marTop">
    <div class="row d-flex justify-content-center">
        <div class="form-check col-5">
            <h2>Supprimer</h2>
        </div>
        <div class="form-check col-3 col-xl-1">
             <h2>Modifier</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-3 col-sm-3">
            @foreach($dimensions as $dimension)
                <div class="row" >
                    <div class="col-8">
                    <p >{{$dimension->dimension}}</p>
                    </div>
                    <div class="col-2">
                        <form id="formSupprimer" class="col-4" method="post" action="{{route('Dimensions.destroy', [$dimension->id])}}">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-center">
                                <button type="submit" id="bouton" class="btn btRouge whiteTxt">X</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-sm-1 col-1"></div>
        <form id="formModifier"  class="col-sm-4 col-5" method="POST" action="{{route('Dimensions.update')}}">
            @csrf
            
            <div class="mb-3 form-group row">
                <label class="form-check-label col-sm-4">Dimension à modifier</label>
                <div class="col-sm-8">
                    <select class="form-select" name="dimension_id">
                        @foreach($dimensions as $dimension)
                            <option  value="{{$dimension->id}}" class="dropdown-item">{{$dimension->dimension}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 form-group row">
                <label class="col-form-label col-sm-4 textForm">Dimension :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="dimension" name="dimension" value="{{ old('dimension')}}">
                    <p id="errorDimension" class="erreur"></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" id="bouton" class="btn btBleu whiteTxt">modifier</button>
            </div>
        </form>
    </div>
</div>





<script src="{{ asset('js/validationDimension.js') }}"></script>
@endsection