<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>trustfy.io</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">


    <link href="{{ asset('css/backend/freelancer/sb-admin.css')}}" rel="stylesheet">
    <link href="{{ asset('css/backend/freelancer/smart_wizard.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/backend/freelancer/smart_wizard_theme_arrows.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/backend/freelancer/style.css')}}" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @yield('css')

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


</body>

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Include SmartWizard JavaScript source -->
<script src="/js/freelancer/jquery.smartWizard.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>


<script type="text/javascript">

    $().alert('close');

    function loadScrips(){
        // External Button Events
        $(".force-next").on("click", function() {
        // Reset wizard
        $('#smartwizard').smartWizard("next");
        return true;
        });

        $(".save-project").on("click", function() {


            if ($("#project-data").valid()) {

                //if valid save company in DB
                data = {};
                obj = {
                    "name" : $("#project-name").val(),
                    "desc" : $("#project-description").val(),
                    "notes" : $("#project-notes").val(),
                    "client" : $("#project-clients").val(),

                    "address1" : $("#project-address1").val(),
                    "address2" : $("#project-address2").val(),
                    "city"     : $("#project-city").val(),
                    "country"  : $("#project-data #country").val(),
                };

                data["project"] = JSON.stringify(obj);
                var msg = save("save-project", data);

            }else{

            }

        });

    }

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

        $(".save-company").on("click", function() {

            if ($("#company-data").valid()) {

                //if valid save company in DB
                data = {};
                obj = {
                    "firstname" : $("#firstname").val(),
                    "lastname" : $("#lastname").val(),
                    "company" : $("#company").val(),
                    "address" : $("#address").val(),
                    "country" :  $("#company-data #country").val(),
                    "city" : $("#city").val(),
                };

                data["company"] = JSON.stringify(obj);
                save("save-company", data);

                //opens next tab
                $('.alert-welcome').hide();
                $('#smartwizard').smartWizard("next");
                return true;

            }else{

            }

        });

        $(".save-client").on("click", function() {

            if ($("#client-data").valid()) {

                //if valid save company in DB
                data = {};
                obj = {
                    "firstname" : $("#client-firstname").val(),
                    "lastname" : $("#client-lastname").val(),
                    "phone" : $("#client-phone").val(),
                    "mobile" : $("#client-mobile").val(),
                    "mail" : $("#client-mail").val(),

                    "currency" : $("#currency").val(),
                    "address1" : $("#client-address1").val(),
                    "address2" : $("#client-address2").val(),
                    "city" : $("#client-city").val(),
                    "country" :  $("#client-data #country").val(),
                };

                data["clients"] = JSON.stringify(obj);
                var msg = save("save-client", data);
                getClients();

            }else{

            }

        });





        function getClients() {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("client-list").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "{{env('MYHTTP')}}/{{$blade["ll"]}}/freelancer/clients/get-by-id", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }


        //initalize the arrow bar on the top of the modal
        $('#smartwizard').smartWizard("theme", "arrows");

        //checks if a new setup is required for the freelancer
        var setup = $('#setup').val();
        if( setup == "yes" ) {
            $('#setup-modal').modal('show');
        }

    });


    function save(url, data) {

        urlAddress = "{{env('MYHTTP')}}/{{$blade["ll"]}}/freelancer/setup/save/" + url;

        if(data != null && Object.keys(data).length > 0) {

            urlAddress += "?";
            for (var k in data) {
                urlAddress += k + "=" + data[k] + "&";
            }
            urlAddress = urlAddress.slice(0, -1);

        }

        $.ajax({

            type: 'GET',
            url: urlAddress,
            data: { variable: 'value' },
            dataType: 'json',
            success: function(data) {
                var items = data["success"];

                if(items == "Client successfully created"){
                    $("#msg").text(items);
                    clearClientForm();
                    $(".client-next").text("Next Step").addClass( "btn-success force-next" ).removeClass( "btn-secondary" );
                    loadScrips();
                }

                if(items == "Project successfully created"){
                    $("#msg-project").text(items);
                    clearProjectForm();
                    $(".project-next").text("Next Step").addClass( "btn-success force-next" ).removeClass( "btn-secondary" );
                    loadScrips();
                }



            }
        });

    }

    function clearClientForm() {

        $("#client-firstname").val('');
        $("#client-lastname").val('');
        $("#client-phone").val('');
        $("#client-mobile").val('');
        $("#client-mail").val('');
        $("#currency").val('');
        $("#client-address1").val('');
        $("#client-address2").val('');
        $("#client-city").val('');
        $("#client-data #country").val('');
    }


    function clearProjectForm() {

        $("#project-name").val('');
        $("#project-description").val('');
        $("#project-notes").val('');
        $("#project-address1").val('');
        $("#project-address2").val('');
        $("#project-city").val('');
        $("#project-data #country").val('');

    }

    // Expand the modal width for setup creation through freelancer
    $("#start-setup").on("click", function() {
        $(".modal-dialog").addClass('modal-expand');
        $('#arrows').removeClass("d-none");
        $('#smartwizard').smartWizard("next");
    });

    // Expand the modal width for setup creation through freelancer
    $("#prev-btn-step1").on("click", function() {
        $('#arrows').addClass("d-none");
        $(".modal-dialog").removeClass('modal-expand');
    });

    // Expand the modal width for setup creation through freelancer
    $(".project-next").on("click", function() {
        $('#arrows').addClass("d-none");
    });





</script>
@yield('js')
</html>
