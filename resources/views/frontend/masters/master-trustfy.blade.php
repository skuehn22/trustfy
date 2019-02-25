<!DOCTYPE html>
<html lang="en">
<head>

@yield('seo')
@include('frontend.masters.elements.meta')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
<link href="{{ asset('css/frontend/homepage.css') }}" rel="stylesheet">
<link href="{{ asset('css/device-mockups/device-mockups.min.css') }}" rel="stylesheet" >

@yield('css')

@include('frontend.masters.elements.tracking')

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
<div class="content">
    @yield('content')
</div>

<footer>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-3">
                <img src="/img/trustfy-new-mixed.png" style="max-width: 200px;" class="img-fluid logo-desktop">
                <p>
                    We build trust between<br> freelancers and their clients
                </p>
            </div>
            <div class="col-md-2">
                <p style="padding-bottom: 10px;"><a href="/en/terms" style="color:#fff;">Terms</a></p>
                <p style="padding-bottom: 10px;"><a href="/en/privacy" style="color:#fff;">Privacy</a></p>
                <p><a href="/en/faq" style="color:#fff;">FAQ</a></p>
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
