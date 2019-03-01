<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="noindex">

    <title>trustfy.io</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <link href="{{ asset('css/backend/freelancer/sb-admin.css')}}" rel="stylesheet">
    <link href="{{ asset('css/backend/freelancer/smart_wizard.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/backend/freelancer/smart_wizard_theme_arrows.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/backend/freelancer/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @yield('css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body id="page-top">
<!--
<nav class="navbar navbar-expand static-top">

    <a class="navbar-brand mr-1" href="index.html">
        <img src="/images/trustfy.png" class="img-responsive logo">
    </a>



    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
-->
    <!-- Navbar Search -->
<!--
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">

        </div>
    </form>
-->
    <!-- Navbar -->
<!-- <ul class="navbar-nav ml-auto ml-md-0">

   <li class="nav-item dropdown no-arrow mx-1">
       <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-bell fa-fw"></i>
           <span class="badge badge-danger">9+</span>
       </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
           <a class="dropdown-item" href="#">Action</a>
           <a class="dropdown-item" href="#">Another action</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#">Something else here</a>
       </div>
   </li>
   <li class="nav-item dropdown no-arrow mx-1">
       <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-envelope fa-fw"></i>
           <span class="badge badge-danger">7</span>
       </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
           <a class="dropdown-item" href="#">Action</a>
           <a class="dropdown-item" href="#">Another action</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#">Something else here</a>
       </div>
   </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle green" data-toggle="dropdown"><i class="fa fa-user"></i> {{$blade["user"]->firstname." ".$blade["user"]->lastname}}<b class="caret"></b></a>
            <ul class="dropdown-menu">

                 <li>
                     <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                 </li>

                <li class="divider"></li>
                <li>
                    <a href="{{ URL::to('en/logout') }}"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                </li>
            </ul>
        </li>
    </ul>

</nav>
-->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <a class="navbar-brand mr-1 pb-5" href="/freelancer/dashboard">
            <img src="/img/trustfy-new-mixed.png" class="img-responsive logo">
        </a>
        <li class="nav-item">
            <a class="nav-link  active" href="{{ URL::to($blade["ll"].'/freelancer/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
               <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/clients') }}">
                <i class="fas fa-users"></i>
                <span>Clients</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/projects') }}">
                <i class="fas fa-project-diagram"></i>
                <span>Projects</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/plans') }}">
                <i class="far fa-money-bill-alt"></i>
                <span>Payment Plans</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/settings') }}">
                <i class="fas fa-cog"></i>
                <span>Settings</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/logout') }}">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
    </ul>

    <div id="content-wrapper" style="padding-bottom: 50px;">

        <div class="container-fluid">
            @yield('content')
        </div>


    </div>

    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © trustfy.io 2019</span> | <span class="terms"><a href="https://www.trustfy.io/en/terms" target="_blank">Terms and Conditions</a></span>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>


</body>

<!-- Include jQuery -->
<script src="https://unpkg.com/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<script src="/js/freelancer/jquery.smartWizard.min.js"></script>

@yield('javascript')
@yield('javascript-expanded')

<script type="text/javascript">




    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


$(document).ready(function () {

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



    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    $().alert('close');



</script>

</html>
