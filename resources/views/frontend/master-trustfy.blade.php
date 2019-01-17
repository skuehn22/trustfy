<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129354427-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129354427-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>trustfy.io - review system</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="/css/new-age.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @yield('seo')
    <style>
        @yield('css')
    </style>

</head>

<body id="app-layout" class="hm-gradient">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ asset('/') }}">
            <img src="/img/trustfy-green.png" width="200px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ asset('/') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="/#download">Create a Review</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="/#contact">Contact</a>
                </li>
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="/logout">Logout</a>
                    @else
                        <a class="nav-link" href="/login">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<div  class="content-bg" style="min-height: 70vh;">

    @yield('content')

</div>

<footer>
    <div class="container">
        <div class="row" style="padding-top:25px;">
            <div class="col-md-3">
                <img src="/img/trustfy-new-mixed.png" style="max-width: 200px;" class="img-fluid logo-desktop">
                <p>
                    We build trust between<br> freelancers and their clients
                </p>
            </div>
            <div class="col-md-2">
                <p style="padding-bottom: 10px;"><a href="/en/terms" style="color:#fff;">Terms</a></p>
                <p><a href="/en/privacy" style="color:#fff;">Privacy</a></p>
            </div>
            <div class="col-md-7">
                <img src="/img/powered-by-mangopay.png" alt="mangopay" style="max-width: 600px;" class="img-fluid">

            </div>
        </div>
    </div>
</footer>

<!-- JavaScripts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="{{ asset('js/trustfy.js') }}"></script>
@yield('js')
</body>
</html>
