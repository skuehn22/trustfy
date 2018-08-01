@extends('backend.master')
@section('seo')
@stop
@section('css')

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
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn" role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Contract</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/contracts" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">View Project</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/contracts" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">View Project</p>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/contracts" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Contract</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/contracts" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Contract</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/contracts" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Contract</p>
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
                                <a href="/en/contracts" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section("js")

    <script>

        function getModalContent($url){

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("modal-body").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade['locale']}}/provider/"+ $url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }

    </script>

@stop