@extends('layouts.standard')
@section('titre','Client')
@section('contenu')



<body>
    <div class="location border-warning col-xl-12" id="home" >
        <div class="box my-5 col-xl-12">

            @if (isset($comptes))
            @foreach($comptes as $compte)
                <a href="{{ route('comptes.pageClient', [$compte->id]) }}">
                    <div class="location border-warning col-xl-12" id="home">
                        <div class="box my-5 col-xl-12">
                            <div class=" ">
                                <h5> Nom </h5>
                                <li>{{ $compte->nom }}</li>
                            </div>
        
                            <div class=" ">
                                <h5> Prenom </h5>
                                <li>{{ $compte->prenom }}</li>
                            </div>
        
                            <div class=" ">
                                <h5> Sexe </h5>
                                <li>{{ $compte->email }}</li>
                            </div>
        
                            <a href="/comptes/{{$compte->id}}" class="btn btn-danger">Modifier compte</a>
                            <form method="post" action="{{route('comptes.destroy',[$comptes->id]) }}">
                                @Csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer compte</button> 
                            </form>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <p> Il n'y a pas de clients. </p>
        @endif
</div>

</body>


@endsection

