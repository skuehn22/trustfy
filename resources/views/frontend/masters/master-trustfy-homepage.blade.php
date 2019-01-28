<!DOCTYPE html>
<html lang="en">

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

</head>

<body id="page-top" class="landing-page landing-page1">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
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
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Sign in</a>
               </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="/registerd">Sign up for free</a>
                </li>
                -->
            </ul>
        </div>
    </div>
</nav>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-7 my-auto">
                <div class="header-content mx-auto">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h1 class="mb-5">We build trust between freelancers and their clients</h1>
                    <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Sign up for the news!</a>
                </div>
            </div>
            <div class="col-lg-5 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="{{ asset('img/trustyfy-screenshot20.png') }}" class="img-fluid logo-desktop" alt="Get paid on time">
                            </div>
                            <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="section section-demo" style="padding-top:45px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>How we Build Trust</h2>
                <p class="homepage-txt" style="margin-top:0px; padding-top: 14px;">
                    Our mission is to ensure that good work is rewarded with fair pay.
                </p>
            </div>
            <div class="col-md-12">
                <div class="demo-image">
                    <img src="{{ asset('img/solution.png') }}" alt="Freelance Escrow System">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section section-demo freelancer" id="features" style="padding-top:45px;">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Freelancer Protection</h2>
            <p class="text-muted">A professional payment system that gets you paid on time.</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="offset-md-2 col-md-10">
                            <br><br>
                            <p class="check-container"> <i class="fas fa-check"></i> Late payment protection</p>
                            <p class="check-container"> <i class="fas fa-check"></i> Payment in-full protection</p>
                            <p class="check-container"> <i class="fas fa-check"></i> Payment in-full protection</p>
                            <p class="check-container"> <i class="fas fa-check"></i> Cancelled milestone protection</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="demo-image">
                    <img src="{{ asset('img/solution1.png') }}" alt="Late Payment Protection">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="features" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Client Protection</h2>
            <p class="text-muted">A secure payment system that puts you in control.</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-4 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait black">
                        <div class="device">
                            <div class="screen">
                                <img src="{{ asset('img/trustyfy-screenshot.png') }}" class="img-fluid" alt="No more deposits in blind faith">
                            </div>
                            <div class="button">
                  </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 my-auto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="check-container"> <i class="fas fa-check"></i> Late work compensation</p>
                            <p class="check-container"> <i class="fas fa-check"></i> Quality of work protection</p>
                            <p class="check-container"> <i class="fas fa-check"></i> Freelancer no-show protection</p>
                            <p class="check-container"> <i class="fas fa-check"></i> No more deposits in blind faith</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section why section-gray">
    <div class="container">

        <div class="col-md-12">
            <h2 class="header-text">Why we care</h2>
            <p class="homepage-txt"> Freelancing is the future of work and more and more people are working as or hiring freelancers.
                To make sure this shift benefits everyone involved, this future must be built on security, transparency and fairness for both freelancers and their clients.
                We’re dedicated to making that happen.</p>
        </div>
        <div class="col-md-12">
            <div class="demo-image">
                <br><br><img src="{{ asset('img/why-we-care.png') }}" style="width:100%;" class="img-responsive" alt="Freelancing Economy">
            </div>
        </div>
        <div class="col-md-12 pb-5">
            <p class="homepage-txt" style="margin-top:0px;"><br><br> We founded Trustfy because we know how difficult it is to go at it alone: We've worked with and as freelancers, and so have many of our friends and family.
                Whether you’re a client or a freelancer, you should be able to focus on what matters most: the project at hand. You shouldn’t be worrying about deposits or payments.
                That’s why we’re here. To provide payment security that brings clients and freelancers to eye level and makes sure both sides get a fair deal.<br><br></p>
        </div>


    </div>
</section>
<section class="contact bg-primary" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" style="text-align: center; ">
                <h4>Be the first to test new features, stay up to date and help us build the product you want!</h4>
                <div class="badges">

                    <form class="form-inline" method="POST" action="/newsletter-sign-up">
                        <div class="input-group" style="width: 100%;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="btn btn-lg" name="email-newsletter" id="email-newsletter" type="email" placeholder="Your Email" required>
                            <button class="btn btn-info btn-lg" type="submit">Sign Up!</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>



<footer id="contact">
    <div class="container pt-3">
        <form id="ratingForm" method="POST" action="/send-message">
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
        </form>
        <div class="row" style="border-top: 1px solid #fff; padding-top:25px;">
            <div class="col-md-3">
                <img src="{{ asset('img/trustfy-new-mixed.png') }}" style="max-width: 200px;" class="img-fluid logo-desktop" alt="Trustfy Freelancer Payment">
                <p>
                    We build trust between<br> freelancers and their clients
                </p>
            </div>
            <div class="col-md-2">
                <p style="padding-bottom: 10px;"><a href="/en/terms" style="color:#fff;">Terms</a></p>
                <p><a href="/en/privacy" style="color:#fff;">Privacy</a></p>
            </div>
            <div class="col-md-7">
                <img src="{{ asset('img/powered-by-mangopay.png') }}" alt="mangopay" style="max-width: 600px;" class="img-fluid">

            </div>
        </div>
        <div class="row" style="padding-top:25px;">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/homepage.min.js') }}"></script>

</body>

</html>
