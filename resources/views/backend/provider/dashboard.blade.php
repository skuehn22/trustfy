@extends('backend.master')
@section('seo')
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
@stop
@section('breadcrumb')
Dashboard
@stop

@section('content')

    <div class="container dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="far fa-envelope"></i> Inbox</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fas fa-magic"></i> Quick Shortcuts</h3>
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
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn disabled" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Contract</p>
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
                        <!--<a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>-->
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
        -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        What do you need?
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                    <!--
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    -->
                </div>
            </div>
        </div>

    </div>



@stop
@section("js")



    <script>

        $( document ).ready(function() {
            loadScrips();
        });

        function loadScrips(){

            //loads content for shortcuts
            $(".modal-btn").click(function() {
                getModalContent($(this).attr('id'));
            })

        }



        function getModalContent($url){

            //alert($url);

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("modal-body").innerHTML = xmlhttp.responseText;
                    loadScrips();
                }
            }
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade['locale']}}/provider/"+ $url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }

    </script>

@stop