<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .container {
            max-width: 1200px;
        }

        .push-top {
            margin-top: 50px;
        }

        .push-bottom {
            margin-bottom: 50px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courrier management app</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css"
          integrity="sha256-l3FykDBm9+58ZcJJtzcFvWjBZNJO40HmvebhpHXEhC0=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <link rel='stylesheet'
          href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
    <script src="https://kit.fontawesome.com/14a2f146e1.js" crossorigin="anonymous"></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset("public/apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset("/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset("/favicon-16x16.png") }}">
    <link rel="manifest" href="{{ URL::asset("/site.webmanifest") }}">
    <link rel="mask-icon" href="{{ URL::asset("/safari-pinned-tab.svg") }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">

</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('login') }}"><img src="{{ URL::asset("favicon-32x32.png") }}" width="40"
                                                             height="40" alt="Ausy Logo">Courrier Management System</a>

    <div class="top-right links">
        @auth
            <a href="{{ url('logout') }}">Vous déconnecter - {{ Auth()->user()->name }}</a>
        @else
            <a href="{{ route('login') }}">Se connecter</a>
        @endauth
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.15.5/bootstrap-table.min.js"
        integrity="sha256-i6G9CgAfmcq/7vYTD52U9501fb2XJiFGPMRGKn0QV7E=" crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.15.5/extensions/editable/bootstrap-table-editable.min.js"
    integrity="sha256-XSltPifpfm4q/z4sC3CCRtPovsASyWK+yATwQdF6jMA=" crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.15.5/extensions/export/bootstrap-table-export.min.js"
    integrity="sha256-OnaKf+O9hVdfJBTLuam3Sc2dm8izuRctXANRiWH/uaw=" crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.15.5/extensions/filter-control/bootstrap-table-filter-control.min.js"
    integrity="sha256-C29viSMl3fnEMgjPNmsODHk7/xO4EvzVAcJ4JC4dewM=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"
        integrity="sha256-+o/X+QCcfTkES5MroTdNL5zrLNGb3i4dYdWPWuq6whY=" crossorigin="anonymous"></script>
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
</body>
</html>
