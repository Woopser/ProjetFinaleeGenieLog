<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield('titre')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}" >
</head>
<body>
    <style type="text/css">
        @font-face {
            font-family: Modelica;
            src: url('{{ public_path('fonts\bw-modelica-lgc-bold.tff') }}');
        }
    </style>
    <!--
        couleur
        000000
        FAF8F8
        5D7687
        AC4658
        231825
    -->
    <nav class="navbar bg-body-tertiary" style="margin-bottom: 3%" style="background-color: black">
        <div class="container-fluid" font-family:Modelica style="background-color: black">
            <img src="{{asset('img/logoInfo.png')}}" alt="Logo" width="175" height="125" class="d-inline-block align-text-top">
        
            <a href="{{ route('comptes.index')}}">Connexion</a>
         <a href="{{ route('Comptes.createClient')}}">Créer un compte client</a>
        <a href="{{ route('Comptes.createAdmin')}}">Créer un compte admin</a>
        <a href="{{ route('Comptes.showAdmin')}}">Afficher admin</a>
        <a href="{{ route('Campagnes.create')}}">Créer une campagne</a>
        <a href="{{ route('Articles.create')}}">Créer un article</a>
        <a href="{{ route('Couleurs.create') }}">Créer une couleur</a>
        <a href="{{ route('Dimensions.create') }}">Créer une dimension</a>
        <a href="{{ route('Articles.index')}}">Page d'achat</a>

        <form method="POST" action="{{route('logout')}}">
            @csrf
            <button id="bouttonAj" type="submit">Deconnexion</button>
          </form>  
        <a href="{{ route('Couleurs.index')}}">Couleurs</a>


       <!-- 
        <a href="">Modifier un client</a>
       -->

            <ul class="nav justify-content-end" style="font-size: 175%" style="color:rgb(8, 44, 115)">
            <li class="nav-item">
        </li>
        </ul>
        
    </div>
    </nav>
    
    

  










@yield('contenu')

<div>


</div>
</body>
</html>