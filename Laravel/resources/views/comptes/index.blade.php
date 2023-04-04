@extends('layouts.standard')
@section('titre', 'Connexion')
@section('contenu')





<form method="POST" action="{{ route('logout')}}">
   @csrf
    <button type= "submit" class="btn btn-danger">Déconnecter</button>
    </form>

@else
<h1>Veuillez vous connecter!</h1>

    <a href="{{route('login')}}"class="btn btn-primary">Page de connexion</a>



@endsection