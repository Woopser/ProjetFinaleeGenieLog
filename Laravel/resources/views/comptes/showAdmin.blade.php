@extends('layouts.standard')

@section('titre', 'index')
@section('contenu')


<body>
<div class="location border-warning" id="home">
    <div class="box my-5">
       
          @foreach($comptes as $compte)
        <h6 class="" style="text-align: center;"> {{ $compte->nom}} {{$compte->prenom}} </h6>
          @endforeach

    </div>

</body>




@endsection