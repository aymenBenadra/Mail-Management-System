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
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courrier management app</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <link rel='stylesheet'
          href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
    <script src="https://kit.fontawesome.com/14a2f146e1.js" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('login') }}">Courrier Management System</a>

    <div class="top-right links">
        @auth
            <a href="{{ url('logout') }}">Logout - {{ Auth()->user()->name }}</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column push-top">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('login')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>IN mail</span>
                    @if(Auth()->user()->role == 'bo' or Auth()->user()->role == 'admin')
                        <a class="d-flex align-items-center text-muted"
                           href="{{route('courriers_'.Auth()->user()->role.'.create')}}" aria-label="Add a new courrier"
                           title="Add a new courrier">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                        </a>
                    @endif
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('courriers_'.Auth()->user()->role.'.index')}}">
                            <i class="fas fa-sync"></i>
                            Current mail
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courriers_'.Auth()->user()->role.'.archive','IN') }}">
                            <i class="fas fa-archive"></i>
                            Mail archive
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('uploadForm') }}">
                            <i class="fas fa-upload"></i>
                            Files upload
                        </a>
                    </li>
                </ul>

                @if(Auth()->user()->role == "admin" or Auth()->user()->role == "bo" or Auth()->user()->role == "dr")
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>OUT mail</span>
                        @if(Auth()->user()->role == "admin" or Auth()->user()->role == "bo")
                            <a class="d-flex align-items-center text-muted" href="{{ route('courriers_OUT.create') }}"
                               aria-label="Add a new report"
                               title="Add a new courrier">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-plus-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                            </a>
                        @endif
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courriers_OUT.index') }}">
                                <i class="fas fa-sync"></i>
                                Current mail
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courriers_'.Auth()->user()->role.'.archive','OUT') }}">
                                <i class="fas fa-archive"></i>
                                Mail archive
                            </a>
                        </li>
                        @if(Auth()->user()->role == "admin" or Auth()->user()->role == "bo")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('uploadForm') }}">
                                    <i class="fas fa-upload"></i>
                                    Files upload
                                </a>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div id="toolbar" class="btn-toolbar mb-2 mb-md-0">
                    <label>
                        <select class="form-control">
                            <option value="all">Export All</option>
                            <option value="selected">Export Selected</option>
                        </select>
                    </label>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
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
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script>
    //exporte les données sélectionnées
    var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    });

    var trBoldBlue = $("table");

    $(trBoldBlue).on("click", "tr", function () {
        $(this).toggleClass("bold-blue");
    });
</script>
</body>
</html>
