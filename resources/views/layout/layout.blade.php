<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Gestion des activites bancaires"/>
    <meta name="author" content="mballoSoft"/>
    <title>BP | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('asset/css/compte.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset/css/client.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}"/>
</head>
<body>
<header>
    <nav>
        <h1>Banque Du <span style="color: aliceblue;">Peuple</span></h1>
    </nav>
</header>

<!--=========Debut sideBarre============-->
<aside class="sidebarre">
    <div class="flex">
        <img src={{asset('img/profil.jpg') }} class="profil" alt="Banque du Peuple" srcset=""/>
        <p class="mail">xywzt@gmail.com</p>
        <div class="contener" style="background-color: rgb(85, 163, 231); color: white;">
            <a href="/">Dashboard</a>
        </div>
        <div class="contener">
            <a href="{{ route('couddou') }}">Compte</a>
        </div>
        <div class="contener">
            <a href="{{ route('beignet') }}">Client</a>
        </div>
        <div class="contener">
            Logout
        </div>
    </div>
</aside>
<!--=========Fin sideBarre============-->

<!--=========Contenu du body==========-->
<article class="content">
    @yield('content')
</article>
<script src="{{ asset('asset/js/main.js') }}"></script>
<script src="{{ asset('asset/js/client.js') }}"></script>
<script src="{{ asset('asset/js/compte.js') }}"></script>
</body>
</html>
