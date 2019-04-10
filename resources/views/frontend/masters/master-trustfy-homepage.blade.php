<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
<title>Trustfy - Trust between freelancers and clients</title>
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
                    <a class="nav-link js-scroll-trigger" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
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
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-4 my-auto">
                <img src="{{ asset('img/jagd.jpg') }}" class="img-fluid logo-desktop" alt="Get paid on time">
            </div>
            <div class="col-lg-8 my-auto">
                <div class="header-content mx-auto">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h1 class="mb-5" style="text-transform: uppercase;text-shadow: 1px 1px 1px #7b7b7b; font-weight: 700">Get paid on time</h1>
                    <h2 style="text-shadow: 1px 1px 1px #7b7b7b; font-weight: 700; padding-bottom: 15px;">Are you regularly chasing payments?</h2>
                        <h2 style="text-shadow: 1px 1px 1px #7b7b7b; font-weight: 700; padding-bottom: 15px;">We help get your money when work is done</h2>
                        <h4 style="text-shadow: 1px 1px 1px #7b7b7b; font-weight: 700; padding-bottom: 15px;">For freelancer and who work with them</h4>

                    <a href="/beta-register" class="btn btn-sign btn-xl js-scroll-trigger">Sign up for free</a>
                </div>
                <!--
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">

                                <img src="{{ asset('img/trustyfy-screenshot20.png') }}" class="img-fluid logo-desktop" alt="Get paid on time">
                            </div>
                            <div class="button">

                  </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</header>

<div class="section section-demo" style="padding-top:45px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Trustfy is an easy to use escrow system for freelancer</h2>
                <p class="homepage-txt text-center" style="margin-top:0px; padding-top: 14px;">
                    It has never been easier to ask a client for a trustworthy deposit! Trustfy creates trust between freelancers and their customers.
                    <br>
                    The freelancer knows that the money is there and the customer is not afraid that the freelancer disappears with the deposit.
                </p>
                <p><hr></p>
            </div>
        </div>
    </div>
</div>


<div class="section section-demo">
    <div class="container">
        <div class="section-heading text-center pb-5">
            <h2>How it works</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid ">
                    <div class="row how-text">
                        <div class="offset-md-2 col-md-10 how-text text-center">
                            <span class="bg-dark text-white rounded-circle px-3 py-2 mx-2 h3">1</span>
                           <p class="how-text pt-0"> <br>The freelancer creates a payment plan and sends it to the client.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="demo-image">
                    <img src="{{ asset('img/solution12.png') }}" alt="Late Payment Protection">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-demo d-none d-lg-block d-md-block d-xl-block">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-4 text-center">
                <div class="demo-image">
                    <div class="col-md-9 float-right">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait black">
                            <div class="device">
                                <div class="screen">
                                    <img src="{{ asset('img/cc-payment.png') }}" class="img-fluid" alt="No more deposits in blind faith">
                                </div>
                                <div class="button">
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>
            </div>
            <div class="col-md-8">
                <div class="container-fluid ">
                    <div class="row how-text">
                        <div class="offset-md-2 col-md-10 how-text text-center">
                            <span class="bg-dark text-white rounded-circle px-3 py-2 mx-2 h3">2</span>
                            <p class="how-text pt-0"> <br>The client opens it up and <br> makes in a escrow account. <br> The money is now safe.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-demo d-lg-none d-md-none d-xl-none">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8">
                <div class="container-fluid ">
                    <div class="row how-text">
                        <div class="offset-md-2 col-md-10 how-text text-center">
                            <span class="bg-dark text-white rounded-circle px-3 py-2 mx-2 h3">2</span>
                            <p class="how-text pt-0"> <br>The client opens it up and <br> makes in a escrow account. <br> The money is now safe.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="demo-image">
                    <div class="col-md-9 float-right">
                        <div class="device-container">
                            <div class="device-mockup iphone6_plus portrait black">
                                <div class="device">
                                    <div class="screen">
                                        <img src="{{ asset('img/cc-payment.png') }}" class="img-fluid" alt="No more deposits in blind faith">
                                    </div>
                                    <div class="button">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
            </div>

        </div>
    </div>
</div>

<div class="section section-demo">
    <div class="container">
        <div class="row text-center">


            <div class="col-md-8">
                <div class="container-fluid ">
                    <div class="row how-text">
                        <div class="offset-md-2 col-md-10 how-text text-center" style="padding-top: 85px;">
                            <span class="bg-dark text-white rounded-circle px-3 py-2 mx-2 h3">3</span>
                            <p class="how-text pt-0"> <br>After the freelancer finshed the work, <br>the mone will be relased</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="demo-image">
                    <div class="col-md-9 float-right">
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
                    </div></div>
            </div>
        </div>
    </div>
</div>


<section class="section section-demo freelancer" id="features" style="padding-bottom:10px;">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Advantages for freelancers</h2>

            <hr>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-file-invoice-dollar advantages-icon"></i> <br>
                                    <span class="advantages-txt">No more chasing payment</span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-meteor advantages-icon"></i> <br>
                                    <span class="advantages-txt"> Get paid much faster</span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-money-bill-alt advantages-icon"></i><br>
                                    <span class="advantages-txt">Confidence in cash flow</span>

                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-lock advantages-icon"></i><br>
                                    <span class="advantages-txt">Protection from unresponsive clients</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="features" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <h2>All for a fair fee</h2>
            <p class="text-muted">Trustfy takes a fair fee of 3%. <br>No hidden extra costs. The costs are only due when the freelancer gets their money.</p>
            <hr>
            <p><br>
                <a href="#contact" class="btn btn-start btn-xl js-scroll-trigger">GET STARTED</a>
            </p>
        </div>
    </div>
</section>

<!--
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
                            <p class="check-container"> <i class="fas fa-check"></i> No deposits in blind faith</p>
                            <p class="check-container"> <i class="fas fa-check"></i> No direct up front payment</p>
                            <p class="check-container"> <i class="fas fa-check"></i> Freelancer no-show protection</p>
                            <p class="check-container"> <i class="fas fa-check"></i> Peace of mind</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<!--
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
-->
<section class="contact bg-primary" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" style="text-align: center; ">
                <h4>Sign up for the news!</h4>
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
<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'efdb2cb1-6f9b-48a2-ba23-add187956429', f: true }); done = true; } }; })();</script>
</body>

</html>
