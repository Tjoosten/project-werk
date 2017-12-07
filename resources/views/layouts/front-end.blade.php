<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
</head>
<body class="content">
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="nav navbar-nav mr-auto">
                    @if (auth()->guest())
                        <li class="nav-item">
                            <a href="{{ route('disclaimer.index') }}" class="nav-link">
                                <i class="fa fa-legal"></i> Disclaimer
                            </a>
                        </li>
                    @endif

                    @if (auth()->check())
                        <li class="nav-item @if (Request::is('admin/users*')) active @endif ">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="fa fa-users"></i> Gebruikers
                            </a>
                        </li>
                    @endif
                </ul>

                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link @if (Request::is('login*')) active @endif">
                                <i class="fa fa-sign-in"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link @if (Request::is('register*')) active @endif">
                                <i class="fa fa-user-plus"></i> Registreer
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h5><i class="fa fa-road"></i> ACME CO INC.</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="">Product</a></li>
                                <li><a href="">Benefits</a></li>
                                <li><a href="">Partners</a></li>
                                <li><a href="">Team</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="">Documentation</a></li>
                                <li><a href="">Support</a></li>
                                <li><a href="">Legal Terms</a></li>
                                <li><a href="">About</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a href="" class="nav-link pl-0"><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-github fa-lg"></i></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-instagram fa-lg"></i></a></li>
                    </ul>
                    <br>
                </div>
                <div class="col-md-2">
                    <h5 class="text-md-right">Contact Us</h5>
                    <hr>
                </div>
                <div class="col-md-5">
                    <form>
                        <fieldset class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </fieldset>
                        <fieldset class="form-group">
                            <textarea class="form-control" id="exampleMessage" placeholder="Message"></textarea>
                        </fieldset>
                        <fieldset class="form-group text-xs-right">
                            <button type="button" class="btn btn-secondary-outline btn-lg">Send</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
