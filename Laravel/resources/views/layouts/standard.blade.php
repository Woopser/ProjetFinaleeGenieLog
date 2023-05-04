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
    <!--
        couleur
        000000
        FAF8F8
        5D7687
        AC4658
        231825
    -->
<!-- Nav bar d'admin-->
@if(isset(Auth::user()->typeCompte))
@if(Auth::user()->typeCompte == "Admin") 
<nav class="navbar ">
    <div class="container-fluid">
    <img src="{{asset('img/logoInfoBlanc.png')}}" alt="Logo" width="175" height="125" class="d-inline-block align-text-top">
      <button class="navbar-toggler navBackGround" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span  class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end navBackGround" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title navTxt" id="offcanvasDarkNavbarLabel">Admin Nav</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="navLi">
                <a class="navTxt " href="{{ route('Articles.index')}}" name="boutonNav">Page d'achat</a>
            </li>
            <li class="navLi">
                <a class="navTxt " href="{{ route('Campagnes.create')}}" name="boutonNav">Créer une campagne</a>
            </li>
            <li class="navLi">
                <a class="navTxt " href="{{ route('Campagne.index')}}">CRUD Campagne</a>
            </li>
            <li class="navLi">
                <a class="navTxt " href="{{ route('Couleurs.create') }}" name="boutonNav">Créer une couleur</a>
            </li>
            <li class="navLi">
                <a class="navTxt" href="{{ route('Couleurs.index')}}" name="boutonNav">Couleurs</a>
            </li>
            <li class="navLi">
                <a class="navTxt " href="{{ route('Dimensions.create') }}" name="boutonNav">Créer une dimension</a>
            </li>
            <li class="navLi">
                <a class="navTxt " href="{{ route('Dimensions.index') }}" name="boutonNav">Dimensions</a>
            </li>
            <li class="navLi">
                <a class="navTxt " href="{{ route('Articles.create') }}" name="boutonNav">Créer un article</a>
            </li>
            <li class="navLi">
                <a class="navTxt " href="{{ route('Comptes.editAdmin') }}" name="boutonNav">Mon compte</a>
            </li>
            <form method="POST" class="navLi" action="{{route('logout')}}">
                @csrf
                <button class="navtxt btn btRouge whiteTxt"  id="bouttonAj" type="submit">Deconnexion</button>
              </form> 
          </ul>
        </div>
      </div>
    </div>
  </nav>
<!-- Nav bar de client -->
@elseif(Auth::user()->typeCompte == "Client")
    <nav class="navbar bg-body-tertiary" style="padding: 0% ">
        <div class="container-fluid navNoir" >
            <img src="{{asset('img/logoInfoBlanc.png')}}" alt="Logo" width="175" height="125" class="d-inline-block align-text-top">
            <a class="navTxt" href="{{ route('Articles.index')}}" name="boutonNav">Page d'achat</a>
            <form method="POST" class="navLi" action="{{route('logout')}}">
                @csrf
                <button class="navtxt btn btRouge "  id="bouttonAj" type="submit">Deconnexion</button>
            </form>
        </div>
    </nav>
<!-- Nav bar de superAdmin -->
@elseif(Auth::user()->typeCompte == "SuperAdmin")
    <nav class="navbar bg-body-tertiary nav" style="padding: 0%" >
        <div class="container-fluid navNoir" >
            <img src="{{asset('img/logoInfoBlanc.png')}}" alt="Logo" width="175" height="125" class="d-inline-block align-text-top">
            <a  class="navTxt" href="{{ route('Comptes.createAdmin')}}" name="boutonNav">Créer un compte Admin</a>
            <form method="POST" class="navLi" action="{{route('logout')}}">
                @csrf
                <button class="navtxt btn btRouge"  id="bouttonAj" type="submit">Deconnexion</button>
              </form>
        </div>
    </nav>
    <!-- autre -->
@endif  
@else
    <nav class="navbar bg-body-tertiary nav" style="padding: 0%">
        <div class="container-fluid navNoir" >
            <img src="{{asset('img/logoInfoBlanc.png')}}" alt="Logo" width="175" height="125" class="d-inline-block align-text-top">
            <a  class="navTxt" href="{{ route('comptes.index')}}" name="boutonNav">Connexion</a>
            <a  class="navTxt" href="{{ route('Comptes.createClient')}}" name="boutonNav">Créer un compte client</a>
            <a class="navTxt" href="{{ route('Articles.index')}}" name="boutonNav">Page d'achat</a>
        </div>
    </nav>
@endisset
@yield('contenu')
<div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>