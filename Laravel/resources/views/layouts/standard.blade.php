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

    <nav class="navbar bg-body-tertiary" style="padding: 0% " style="background-color: #000000">
        <div class="container-fluid" font-family:Modelica style="background-color: #000000 ">
            <img src="{{asset('img/logoInfoBlanc.png')}}" alt="Logo" width="175" height="125" class="d-inline-block align-text-top">
            
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('comptes.index')}}" name="boutonNav">Connexion</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Comptes.createClient')}}" name="boutonNav">Créer un compte client</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Comptes.createAdmin')}}" name="boutonNav">Créer un compte admin</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Comptes.showAdmin')}}" name="boutonNav" >Afficher admin</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Campagnes.create')}}" name="boutonNav">Créer une campagne</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Articles.create')}}" name="boutonNav">Créer un article</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Couleurs.create') }}" name="boutonNav">Créer une couleur</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="navTxt" href="{{ route('Dimensions.create') }}" name="boutonNav">Créer une dimension</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Articles.index')}}" name="boutonNav">Page d'achat</a>
            <a onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class=" navTxt" href="{{ route('Couleurs.index')}}" name="boutonNav">Couleurs</a>
            <a href="{{ route('Campagne.index')}}">CRUD Campagne</a>
        <form method="POST" action="{{route('logout')}}">
            @csrf
            <button id="bouttonAj" type="submit">Deconnexion</button>
          </form>  
        
       <!-- 
        <a href="">Modifier un client</a>
       -->

    </div>
    </nav>

@yield('contenu')
<div>
</div>
</body>
</html>
<script src="{{ asset('js/layoutJs.js') }}"></script>