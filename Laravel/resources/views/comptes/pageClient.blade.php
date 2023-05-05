@extends('layouts.standard')
@section('titre','Client')
@section('contenu')




<body>

    <div class="location border-warning col-xl-12" id="home">

    <div class="location border-warning col-xl-12 marTop" id="home" >

        <div class="box my-5 col-xl-12">
            @if (isset($comptes))
                @foreach($comptes as $compte)     
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
                                <h5> Courriel </h5>
                                <li>{{ $compte->email }}</li>
                            </div>
                            <a href="{{route('Comptes.edit',[$compte])}}" class="btn btn-danger">Modifier compte</a>
                            <form method="post" action="{{ route('comptes.destroy', [$compte->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btRouge">Supprimer compte</button>
                            </form>
                        </div>
                    </div>         
                @endforeach

                <h2>Liste des commandes</h2>
                @if(count($commandes) > 0)
                    <ul>
                        @foreach($commandes as $commande)
                            <li>Numéro de commande: {{ $commande->id }}</li>
                            <li>Date de commande: {{ $commande->dateCommande}}</li>
                            <li>Statut de la commande: {{ $commande->statu}}</li>
                            <li>Dimension: {{ $commande->dimension}}</li>
                            <li>Couleur de la  commande: {{ $commande->couleur}}</li>
                            <br>
                        @endforeach
                    </ul>
                @else
                    <p>Aucune commande n'a été effectuée par ce client.</p>
                @endif

            @else
                <p> Il n'y a pas de clients. </p>
            @endif
        </div>
    </div>
</body>


@endsection

