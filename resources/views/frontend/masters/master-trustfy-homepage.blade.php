<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
<title>{{ trans('seo.title_home') }}</title>
<meta name="description" content="{{ trans('seo.desc_home') }}">
<meta name="keywords" content="{{ trans('seo.keywords_home') }}">
<link rel="canonical" href="{{ URL::current() }}" />
@include('frontend.masters.elements.meta')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
<link href="{{ asset('css/frontend/homepage.min.css') }}" rel="stylesheet">


@if (env('APP_ENV')=='live')
    @include('frontend.masters.elements.tracking')
@endif

</head>

<body id="page-top" class="landing-page landing-page1">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container pl-0">
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
                    <a class="nav-link" href="#home">{{ trans('index.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/{{$blade["locale"]}}/{{ trans('index.about_url') }}">{{ trans('index.about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">{{ trans('index.contact') }}</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="/{{$blade["locale"]}}/faq">FAQ</a>
               </li>
                <li class="nav-item">
                    <a class="nav-link" href="/{{$blade["locale"]}}/login">{{ trans('index.sign_in') }}</a>
               </li>
                <li class="switcher"><a href="/de">DE</a> <span>|</span> <a href="/en">EN</a></li>
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

            <div class="d-lg-none d-md-none d-xl-none my-auto">
                <img src="{{ asset('img/men.jpg') }}" class="img-fluid logo-desktop" alt="Get paid on time">
            </div>


            <div class="col-lg-8 my-auto">
                <div class="header-content mx-auto">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12  pl-0 pr-0">

                        <!--<h1 class="mb-2">{{ trans('index.heading_1') }}</h1>-->
                        <h1>{{ trans('index.heading_2') }}</h1>
                        <h2>{{ trans('index.heading_3') }}</h2>
                        <h3>{{ trans('index.heading_4') }}</h3>
                        <!--<h4>{{ trans('index.heading_4') }}</h4>-->

                        </div>
                    </div>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url($blade["locale"].'/create-plan') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4  pl-0 pr-0">
                            <div class="form-group">
                                <select class="form-control input-lg header-form" id="inputlg" name="freelancer" type="text">
                                    <option value="0">{{ trans('index.header-form1') }}</option>
                                    <!--<option>I'm a Client</option>-->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-5 pr-0 pl-0">
                            <div class="form-group">
                                <select class="form-control input-lg header-form" id="inputlg" name="type" type="text">
                                    <option value="0">{{ trans('index.header-form2') }}</option>
                                    <option value="1">{{ trans('index.header-form3') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4 pl-0 pr-0">
                            <div class="form-group">
                                <input class="form-control input-lg header-form" id="inputlg" name="amount" type="number" value="1100">
                            </div>
                        </div>

                        <div class="col-md-3 pr-0 pl-0">
                            <div class="form-group">
                                <select class="form-control input-lg header-form" name="cur" id="inputlg" type="text">
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 float-right  pl-1">
                            <input type="submit" class="btn btn-create" value="{{ trans('index.header-form5') }}">
                        </div>

                    </div>

                    </form>
                </div>
            </div>
            <div class=" d-none d-lg-block d-md-block d-xl-block col-lg-4 my-auto">
                <img src="{{ asset('img/men.jpg') }}" class="img-fluid logo-desktop" alt="Get paid on time">
            </div>
        </div>
    </div>
</header>

<div class="section section-demo" style="padding-top:45px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-muted">    {!! trans('index.escrow') !!}</h2>
                <p class="homepage-txt text-center text-muted" style="margin-top:0px; padding-top: 14px; font-size: 19px;">
                    {!! trans('index.escrow_sub') !!}
                </p>
                <p>
                    <a href="/{{$blade["locale"]}}/{!! trans('index.escrow_url') !!}" class="btn btn-start btn-xl js-scroll-trigger">{!! trans('index.learn_more') !!}</a>
                    <br><br>
                </p>
                <hr>
            </div>
        </div>
    </div>
</div>


<div class="section section-demo">
    <div class="container">
        <div class="section-heading text-center pb-5">
            <h2 class="text-muted">{!! trans('index.how') !!}</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid ">
                    <div class="row how-text">
                        <div class="offset-md-2 col-md-10 how-text text-center">
                            <span class="bg-dark text-white rounded-circle px-3 py-2 mx-2 h3">1</span>
                           <p class="how-text pt-0"> {!! trans('index.how1') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="demo-image">
                    <img src="{{ asset('img/solution12.png') }}" alt="Escrow Late Payment Protection">
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
                                    <img src="{{ asset('img/cc-payment.png') }}" class="img-fluid" alt="{{ trans('seo.alt1_home') }}">
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
                            <p class="how-text pt-0"> {!! trans('index.how2') !!}</p>
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
                            <p class="how-text pt-0"> {!! trans('index.how2') !!}</p>
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
                                        <img src="{{ asset('img/cc-payment.png') }}" class="img-fluid" alt="{{ trans('seo.alt2_home') }}">
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
                            <p class="how-text pt-0">{!! trans('index.how3') !!}
                            </p>
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
                                        <img src="{{ asset('img/trustyfy-screenshot.png') }}" class="img-fluid" alt="{{ trans('seo.alt3_home') }}">
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
            <h2 class="text-muted">{!! trans('index.advantages') !!}</h2>

            <hr>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 text-center" style="padding-bottom: 50px;">
                                    <i class="fas fa-file-invoice-dollar advantages-icon"></i> <br>
                                    <span class="advantages-txt">{!! trans('index.advantage1') !!}</span>
                                </div>
                                <div class="col-md-3 text-center" style="padding-bottom: 50px;">
                                    <i class="fas fa-meteor advantages-icon"></i> <br>
                                    <span class="advantages-txt"> {!! trans('index.advantage2') !!}</span>
                                </div>
                                <div class="col-md-3 text-center" style="padding-bottom: 50px;">
                                    <i class="fas fa-money-bill-alt advantages-icon"></i><br>
                                    <span class="advantages-txt">{!! trans('index.advantage3') !!}</span>

                                </div>
                                <div class="col-md-3 text-center" style="padding-bottom: 50px;">
                                    <i class="fas fa-lock advantages-icon"></i><br>
                                    <span class="advantages-txt">{!! trans('index.advantage4') !!}</span>
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
        <div class="section-heading">
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-5 text-muted">
                    <div class="col-md-12 p-0 text-center">
                        <i class="fas fa-user-lock explain-icon"></i>
                        <h3>{!! trans('index.deposit1') !!}</h3>
                    </div>
                    <div class="col-md-12 p-0">
                        <p>{!! trans('index.deposit2') !!}</p>
                        <p>{!! trans('index.deposit3') !!}</p>
                        <p>{!! trans('index.deposit4') !!}</p>
                    </div>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-5 text-muted">
                    <i class="fas fa-file-alt explain-icon"></i><h3>{!! trans('index.deposit5') !!}</h3>
                    <p>{!! trans('index.deposit6') !!}</p>
                    <p>{!! trans('index.deposit7') !!}</p>
                    <p>{!! trans('index.deposit8') !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features freelancer" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <h3 class="text-muted">{!! trans('index.fee') !!}</h3>
            <p class="text-muted" style="padding-top:15px; font-size: 20px;">{!! trans('index.fee1') !!}</p>
            <p class="text-muted" style="font-size: 20px;">{!! trans('index.fee2') !!}</p>
            <hr>
            <p><br>
                <a href="/{{$blade["locale"]}}/free-register" class="btn btn-start btn-xl js-scroll-trigger">{!! trans('index.get_started') !!}</a>
            </p>
        </div>
    </div>
</section>

<section class="contact bg-primary" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" style="text-align: center; ">
                <h3 class="text-muted">{!! trans('index.news') !!}</h3>
                <div class="badges">

                    <form class="form-inline" method="POST" action="/newsletter-sign-up">
                        <div class="input-group" style="width: 100%;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="btn btn-lg" name="email-newsletter" id="email-newsletter" type="email" placeholder="{!! trans('index.your_mail') !!}" required>
                            <button class="btn btn-info btn-lg" type="submit">{!! trans('index.sign_up2') !!}</button>
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
                        <h3>{!! trans('index.contact_form') !!}</h3>
                        <h5>{!! trans('index.contact1') !!}</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{!! trans('index.contactname') !!}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="email" name="email" placeholder="{!! trans('index.contactmail') !!}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" rows="4" id="message" name="message" placeholder="{!! trans('index.contactmsg') !!}" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <input class="btn btn-info" type="submit" value="{!! trans('index.send') !!}">
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
                    {!! trans('index.claim') !!}
                </p>
            </div>
            <div class="col-md-2">
                <p style="padding-bottom: 10px;"><a href="/{{$blade["locale"]}}/terms" style="color:#fff;"> {!! trans('index.terms') !!}</a></p>
                <p style="padding-bottom: 10px;"><a href="/{{$blade["locale"]}}/privacy" style="color:#fff;"> {!! trans('index.privacy') !!}</a></p>
                <p><a href="/{{$blade["locale"]}}/faq" style="color:#fff;">FAQ</a></p>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('img/powered-by-mangopay.png') }}" alt="mangopay" class="img-responsive img-fluid">
            </div>
            <div class="col-md-2">
                <a href="https://ie.linkedin.com/company/work-smarter-payment?trk=public_profile_topcard_current_company" target="_blank"><img src="{{ asset('img/linkedin.png') }}" alt="mangopay" class="img-responsive img-fluid"></a>
                <a href="https://www.facebook.com/trustfy/" target="_blank"><img src="{{ asset('img/facebook.png') }}" alt="mangopay" class="img-responsive img-fluid"></a>
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
<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'efdb2cb1-6f9b-48a2-ba23-add187956429', f: true }); done = true; } }; })();</script>
</body>

</html>
