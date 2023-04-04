<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield('titre')</title>
</head>
<body>
    <style type="text/css">
        @font-face {
            font-family: Modelica;
            src: url('{{ public_path('fonts\bw-modelica-lgc-bold.tff') }}');
        }
        </style>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid" font-family:Modelica>
            <img src="{{asset('img/CegeptrLogo.png/')}}" alt="Logo" width="200" height="150" class="d-inline-block align-text-top">
        
        <ul class="nav justify-content-end" style="font-size: 225%" style="color:rgb(8, 44, 115)">
        <li class="nav-item">
          <a style="color:rgb(8, 44, 115)" class="nav-link disabled">Déconnecter</a>
        </li>
        </ul>
        </div>
    </nav>
    
    





@yield('contenu')

<div>


</div>
</body>
</html>