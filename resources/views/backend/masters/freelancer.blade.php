<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>trustfy.io</title>

    <!-- Bootstrap core CSS-->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Page level plugin CSS-->
    <!--<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">

    <link href="/css/freelancer/backend/smart_wizard.min.css" rel="stylesheet" type="text/css" />

    <!-- Optional SmartWizard theme -->
    <link href="/css/freelancer/backend/smart_wizard_theme_circles.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/freelancer/backend/smart_wizard_theme_arrows.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/freelancer/backend/smart_wizard_theme_dots.min.css" rel="stylesheet" type="text/css" />

    <link href="/css/freelancer/backend/style.css" rel="stylesheet">


</head>

<body id="page-top">

<nav class="navbar navbar-expand static-top">

    <a class="navbar-brand mr-1" href="index.html">
        <img src="/images/trustfy.png" class="img-responsive logo">
    </a>



    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">

        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <!--
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
        -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle green" data-toggle="dropdown"><i class="fa fa-user"></i> {{$blade["user"]->firstname." ".$blade["user"]->lastname}}<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <!--
                 <li>
                     <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                 </li>
                -->
                <li class="divider"></li>
                <li>
                    <a href="{{ URL::to('en/logout') }}"><i class="fa fa-fw fa-power-off"></i>Logout</a>
                </li>
            </ul>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/plans') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>Payment Plans</span>
            </a>
            <!--
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Login Screens:</h6>
                <a class="dropdown-item" href="login.html">Login</a>
                <a class="dropdown-item" href="register.html">Register</a>
                <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.html">404 Page</a>
                <a class="dropdown-item active" href="blank.html">Blank Page</a>
            </div>
            -->
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/clients') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Clients</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ URL::to($blade["ll"].'/freelancer/projects') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Projects</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © trustfy.io 2019</span>
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

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Include SmartWizard JavaScript source -->
<script src="/js/freelancer/jquery.smartWizard.min.js"></script>
<script type="text/javascript">

    //Close Bootstrap Alert Box
    $().alert('close');

    $(document).ready(function(){
        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'default',
            transitionEffect:'slide',
            autoAdjustHeight: false,
            toolbarSettings: {toolbarPosition: 'none',
                toolbarExtraButtons: [
                    {label: 'Finish', css: 'btn-success', onClick: function(){ alert('Finish Clicked'); }},
                    {label: 'Cancel', css: 'btn-warning', onClick: function(){ $('#smartwizard').smartWizard("reset"); }}
                ]
            }
        });



        // External Button Events
        $("#reset-btn").on("click", function() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");
            return true;
        });

        $(".prev-btn").on("click", function() {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;
        });

        $(".next-btn").on("click", function() {
            // Navigate next
            $('#smartwizard').smartWizard("next");
            return true;
        });

        $('#smartwizard').smartWizard("theme", "arrows");
        $("#smartwizard").smartWizard("fixHeight");

    });
</script>
@yield('js')
</body>

</html>
