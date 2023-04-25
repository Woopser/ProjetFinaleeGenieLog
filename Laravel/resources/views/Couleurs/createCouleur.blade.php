@extends('layouts.standard')
@section('titre', 'Connexion')
@section('contenu')

@if(isset($errors) && $errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{$error}}</p>

        @endforeach

    </div>
@endif

<div class="align-items-center">
    <form class="d-flex justify-content-center" method="post" action="{{route('Couleurs.store')}}">
        @csrf
        
    </form>
</div>
@endsection