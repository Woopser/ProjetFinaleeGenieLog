@extends('layouts.standard')
@section('titre', 'Connexion')
@section('contenu')

<!--debut header-->
<!DOCTYPE html>
<html lang="fr-CA">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('titre') </title>
   
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaquery.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/bc3a1796c2.js" crossorigin="anonymous"></script>
   
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </head>

<body>


<div class="row marTop">
    <div class="col-xl-4 offset-xl-4 login">
    <h1> Veuillez vous connecter</h1>
    <form method="post" action="{{ route('login')}}">
    @csrf
    <div class="form-group" >

        <label for="email"> Email </label>
        <input type="email" class="form-control" id="email" placeholder="Email de l'usager" name="email" value="{{ old('email')}}"><br><br>

        <label for="motDePasse"> Password</label>
        <input type="password" class="form-control" id="password" placeholder="Mot de passe de l'usager" name="password" value="{{ old('password')}}"><br><br>

    </div>
    
    <div class="row">
    <div class="col-xl-4 offset-xl-4 text-center">
    <button type="submit" class="btn btn-danger text-center mb-5">Connexion</button>
    </div>
    </div>
   
     </form>

     </div>
     </div>


</body>
</html>
@endsection