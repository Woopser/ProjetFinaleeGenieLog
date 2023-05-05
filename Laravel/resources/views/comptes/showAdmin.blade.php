@extends('layouts.standard')

@section('titre', 'index')
@section('contenu')


<body>
<div class=" marTop" id="home">
   <div class="d-flex justify-content-center">
      @if(isset($comptes))
      <div class="col-6">
         @foreach($comptes as $compte)
         <div class="d-flex justify-content-center marTop">
            <h6 class="col-4"> {{$compte->email}}</h6>
            <h6 class="col-3">{{ $compte->nom}} {{$compte->prenom}} </h6>
            <form method="post" class="col-3" action="{{route('Comptes.destroyAdminSuper',[$compte->id]) }}">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btRouge">Supprimer</button> 
            </form>
         </div>
      @endforeach
      </div>
   </div>
   @else
   <p> il n'y a pas d'admin. </p>
   @endif

</body>




@endsection