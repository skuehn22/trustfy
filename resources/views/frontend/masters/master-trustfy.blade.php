<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Trustfy - Freelancer get paid on time without payment reminder</title>
    <meta name="description" content="Create easy payment plans for freelancer and your clients pay at a press of a button during the ongoing project. No more payment delays in the future.">
    <meta name="keywords" content="Trustfy, Freelancer, Payment, Escrow, Reminder, Milestone">
    @include('frontend.masters.elements.meta')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/frontend/homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/device-mockups/device-mockups.min.css') }}" rel="stylesheet" >

    @include('frontend.masters.elements.tracking')

    <style>

        h2{
            font-size: 20px;
        }

        h3{
            font-size: 18px;
            font-weight: 600;
        }

        p{
            font-size: 16px;
        }

        body{
            padding-bottom: 0px;
            color: #16150f;
        }

        header.masthead {
            position: relative;
            width: 100%;
            padding-top: 90px;
            padding-bottom: 100px;
            color: #16150f;
            height: initial;
        }

        footer {
            text-align: center;
            color: rgba(255, 255, 255, 0.3);
            background-color: #222222;
            position: absolute;
            right: 0;
            bottom: -80px;
            left: 0;
        }

        .content{
            padding-left: 110px;
            padding-right: 110px;
            padding-top: 45px;

        }

        .content-container{
            box-shadow: 6px 6px 6px rgba(0,0,0,0.16), 6px 6px 6px rgba(0,0,0,0.23);
            background-color: #fff;

        }

    </style>

    @yield('css')


</head>

<body id="page-top" class="landing-page landing-page1">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">
            <img src="{{ asset('img/trustfy-new-mixed.png') }}" style="max-width: 200px;" class="img-fluid logo-desktop" alt="Trustfy Freelancer Payment">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!--<li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#download">Create a review</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Sign in</a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="/beta-register">Sign up for free</a>
                </li>
                -->
            </ul>
        </div>
    </div>
</nav>

<header class="masthead" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
</header>




<footer id="contact">
    <div class="container pt-3">
        <form id="ratingForm" method="POST" action="/send-message">
            <!--
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row" style="padding-bottom:25px;">
                <div class="offset-md-3 col-md-5">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h3>Get in Contact</h3>
                            <h5>Give us a shout! We'd love to hear from you.</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-Mail">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="4" id="message" name="message" placeholder="Message" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <input class="btn btn-info" type="submit" value="Send">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>-->
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('img/trustfy-new-mixed.png') }}" style="max-width: 200px;" class="img-fluid logo-desktop" alt="Trustfy Freelancer Payment">
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
                <img src="{{ asset('img/powered-by-mangopay.png') }}" alt="mangopay" class="img-responsive img-fluid">

            </div>
        </div>
        <div class="row" style="padding-top:25px;">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/homepage.min.js') }}"></script>

</body>

</html>
