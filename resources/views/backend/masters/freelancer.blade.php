<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">

    <title>trustfy.io</title>
    <link href="{{ asset('css/backend/freelancer/bootstrap_4_0.css')}}" rel="stylesheet">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/backend/style_backend.css')}}" rel="stylesheet">
    <link href="{{ asset('css/backend/freelancer/smart_wizard.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/backend/freelancer/smart_wizard_theme_arrows.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/backend/freelancer/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/backend/freelancer/tour.css')}}" rel="stylesheet">

    @yield('css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>


<body>

<header class="cd-main-header">
    <a href="{{ URL::to($blade["ll"].'/freelancer/dashboard') }}" class="cd-logo">
        <img src="/img/trustfy-new-mixed.png" class="img-responsive logo" style="width: 150px;">
    </a>
    <a href="#0" class="cd-nav-trigger">Menu<span></span></a>
    <nav class="cd-nav">
        <ul class="cd-top-nav">
            <li><a href="/freelancer/dashboard?tour=activate">Tour</a></li>
            <li><a href="#0">Support</a></li>
            <li class="has-children account">
                <a href="#0">
                    <i class="fas fa-user-circle"></i>
                    Account
                </a>
                <ul>
                    <li><a href="{{ URL::to($blade["ll"].'/freelancer/settings') }}">My Account</a></li>
                    <li><a href="{{ URL::to($blade["ll"].'/logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<main class="cd-main-content">
    <nav class="cd-side-nav">
        <ul class="navbar-nav">
            <li class="cd-label">Main</li>
            <li class="has-children dashboard-sidebar">
                <a href="{{ URL::to($blade["ll"].'/freelancer/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="has-children client-sidebar">
                <a href="{{ URL::to($blade["ll"].'/freelancer/clients') }}"><i class="fas fa-users"></i> Clients</a>
                <ul>
                    <li>
                        <a href="{{ URL::to($blade["ll"].'/freelancer/clients') }}">
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to($blade["ll"].'/freelancer/clients/new') }}">
                            Add Client
                        </a>
                    </li>

                </ul>
            </li>
            <!--
            <li class="has-children">
                <a href="{{ URL::to($blade["ll"].'/freelancer/projects') }}"><i class="fas fa-project-diagram"></i> Projects</a>
                <ul>
                    <li>
                        <a href="{{ URL::to($blade["ll"].'/freelancer/projects') }}">
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to($blade["ll"].'/freelancer/projects/new') }}">
                            Add Project
                        </a>
                    </li>

                </ul>
            </li>

            -->
            <li class="has-children plan-sidebar">
                <a href="{{ URL::to($blade["ll"].'/freelancer/plans') }}">  <i class="far fa-money-bill-alt"></i> Payment Plans</a>
                <ul>
                    <li>
                        <a href="{{ URL::to($blade["ll"].'/freelancer/plans') }}">
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to($blade["ll"].'/freelancer/plans/new') }}">
                            Add Plan
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <ul>
            <li class="cd-label">Secondary</li>
            <li class="has-children settings-sidebar">
                <a href="{{ URL::to($blade["ll"].'/freelancer/settings') }}">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
            <li class="has-children">
                <a class="nav-link" href="{{ URL::to($blade["ll"].'/logout') }}">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
        <ul>
            <li class="cd-label">Action</li>
            <li class="action-btn"><a href="{{ URL::to($blade["ll"].'/freelancer/plans/new') }}">Create Plan</a></li>
        </ul>
    </nav>

    <div class="content-wrapper">
        @yield('content')
        <input type="hidden" name="tour" id="tour" value="{{$blade["user"]->tour}}">
    </div>

</main>

<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © trustfy.io 2019</span> | <span class="terms"><a href="https://www.trustfy.io/en/terms" target="_blank">Terms and Conditions</a></span>
        </div>
    </div>
</footer>
<div class="cd-nugget-info d-none">
    <h1>Product Tour</h1>
    <p>Dickie!! :)</p>
    <button id="cd-tour-trigger" class="cd-btn">Start tour</button>
    <button id="cd-tour-trigger-step1" class="cd-btn d-none">Step 1 of 3 </button>
    <button id="cd-tour-trigger-step2" class="cd-btn d-none">Step 2 of 3 </button>
    <button id="cd-tour-trigger-step3" class="cd-btn d-none">Step 3 of 3 </button>
    <button id="cd-tour-trigger-step4" class="cd-btn d-none">Finished</button>
</div>

<ul class="cd-tour-wrapper d-none">
    <li class="cd-single-step">
        <span>Step 1</span>

        <div class="cd-more-info bottom">
            <h2>Step Number 1: Company</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi alias animi molestias in, aperiam.</p>
            <img src="/img/step-1.png" alt="step 1">
        </div>
    </li> <!-- .cd-single-step -->

    <li class="cd-single-step tour-step-2">
        <span>Step 2</span>

        <div class="cd-more-info right">
            <h2>Step Number 2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia quasi in quisquam.</p>
            <img src="/img/step-2.png" alt="step 2">
        </div>
    </li> <!-- .cd-single-step -->

    <li class="cd-single-step tour-step-3">
        <span>Step 3</span>

        <div class="cd-more-info right">
            <h2>Step Number 3</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio illo non enim ut necessitatibus perspiciatis, dignissimos.</p>
            <img src="/img/step-3.png" alt="step 3">
        </div>
    </li> <!-- .cd-single-step -->
</ul> <!-- .cd-tour-wrapper -->

<div class="cd-app-screen d-none"></div>

<div class="cd-cover-layer"></div>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
-->

<script src="/js/freelancer/main.js"></script>
<script src="/js/freelancer/menu-aim.js"></script>


<!-- Include jQuery -->
<script src="https://unpkg.com/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script src="/js/freelancer/jquery.smartWizard.min.js"></script>

<!--order of script is important-->
<script>
    var url = "{{env("APP_SSL")}}://" + window.location.hostname + window.location.pathname;
    //alert(url);

    $('ul.navbar-nav li a').each(function () {

        if (this.href == url) {

            $("ul.navbar-nav li").each(function () {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                }
            });
            $(this).parents().addClass('active');
        }
    });


    $('ul.navbar-nav li ul').removeClass("active");
    $('ul.navbar-nav li ul li').removeClass("active");
</script>


@yield('javascript')
@yield('javascript-expanded')

<script type="text/javascript">


    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    $(document).ready(function () {


        if($("#tour").length && $("#tour").val() == "true"){
            $(".cd-tour-wrapper").removeClass('d-none');
            $(".cd-nugget-info").removeClass('d-none');
            $(".cd-app-screen").removeClass('d-none');
            $(".blur-dashboard").addClass('blur');
            $(".cd-tour-nav").addClass('d-none');
        }


    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    $().alert('close');



</script>
</body>
</html>