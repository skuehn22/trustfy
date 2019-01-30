@extends('backend.masters.freelancer')
@section('seo')

@stop
@section('css')

    <style>

        .nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
        .tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
        .tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
        .tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
        .tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
        .tab-pane .list-group .glyphicon { margin-right:5px; }
        .tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
        a.list-group-item.read { color: #222;background-color: #F3F3F3; }
        hr { margin-top: 5px;margin-bottom: 10px; }
        .nav-pills>li>a {padding: 5px 10px;}

        .ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 80%;border: 1px solid #E5E5E5; }
        .ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 110%;}
        .ad a.url {color: #093;text-decoration: none;}

        @keyframes open-plans-left{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate({{$openLeft}}deg);
                transform: rotate({{$openLeft}}deg);
            }
        }

        @keyframes open-plans-right{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate({{$openRight}}deg);
                transform: rotate({{$openRight}}deg);
            }
        }


        @keyframes loading-2{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(10deg);
                transform: rotate(10deg);
            }
        }
        @keyframes loading-3{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(90deg);
                transform: rotate(90deg);
            }
        }
        @keyframes loading-4{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(36deg);
                transform: rotate(36deg);
            }
        }
        @keyframes loading-5{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(126deg);
                transform: rotate(126deg);
            }
        }
    </style>

@stop

@section('content')

    <div class="container dashboard d-none">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                    <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                    <div class="progress-value">20%</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                    <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                    <div class="progress-value">75%</div>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 col-md-12">
                    @include('backend.freelancer.inbox.index')
                </div>
            </div>
        </div>
    </div>

    <!--
    <div class="container dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="far fa-envelope"></i> Inbox
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-12">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-md-12">
                               <a class="btn btn-primary" href="/freelancer/plan/create">Create Payment Plan</a>
                            </div>
                        </div>

                    </div>
                </div>

                -->

               <!--
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="far fa-chart-bar"></i> Bookmarked</h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
                -->
    <!--
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fas fa-magic"></i> Quick Shortcuts
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn modal-btn" id="contract-types" role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Document</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn disabled" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">View Project</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn disabled" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">View Project</p>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/mangopay/sandbox" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Mangopay Sandbox</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn modal-btn" id="clients" role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-address-book"></i> <br/><p style="padding-top: 11px;">View Clients</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/provider/settings" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-cog"></i> <br/><p style="padding-top: 11px;">Settings</p>
                                </a>
                            </div>
                        </div>
                        <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>
                    </div>

                </div>
                <!--
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fas fa-chart-line"></i> KPIs</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <a href="/en/documents" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
                                <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Bookmarks</a>
                                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
                                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>   -->

        <!-- Modal -->
        <div class="modal fade" id="setup-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
<!--
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    -->
                    <div class="modal-body" id="modal-body">
                        @include('backend.freelancer.setup.welcome')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <input id="setup" type="hidden" value="{{$setup}}">


@stop
@section("javascript")
    <script type="text/javascript">

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


    //initalize the arrow bar on the top of the modal
    $('#smartwizard').smartWizard("theme", "arrows");

    //checks if a new setup is required for the freelancer
    var setup = $('#setup').val();
    if( setup == "yes" ) {
    $('#setup-modal').modal('show');

    }else{
        $('.dashboard').removeClass('d-none');
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
@stop