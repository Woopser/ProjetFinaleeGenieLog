@extends('layouts.standard')

@section('titre', 'index')
@section('contenu')


<body>
<div class="location border-warning" id="home">
    <div style="display: inline-block; width: 50%; vertical-align: top;">
       @if(isset($comptes))
          @foreach($comptes as $compte)
        <h6 class="" style="text-align: center;"> {{ $compte->nom}} {{$compte->prenom}} </h6>
         
        </div>
        
        <div style="display: inline-block; width: 50%; vertical-align: top;">
            <form method="post" action="{{route('comptes.destroy',[$compte->id]) }}">
                @Csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer compte</button> 
            </div>
             @endforeach
            @else
            <p> il n'y a pas d'admin. </p>
            @endif

</body>




@endsection