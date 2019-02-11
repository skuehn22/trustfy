@extends('backend.masters.freelancer')
@section('seo')
@stop
@section('css')
    <style>

    .modal-content {
        min-height: 200px;
    }


    </style>
@stop
    <div class="settings">
        <div class="row">
            <div class="col-md-12">
                <div id="exTab3">
                    <ul  class="nav nav-pills">
                        <li class="active"><a  href="#1b" data-toggle="tab">Company</a></li>
                        <li><a href="#2b" data-toggle="tab">Account</a></li>
                        <!--<li><a href="#3b" data-toggle="tab">Team Members</a></li>-->
                        <li><a href="#4b" data-toggle="tab">Banking</a></li>
                    </ul>
                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1b">
                            @include('backend.freelancer.settings.company')
                        </div>
                        <div class="tab-pane" id="2b">
                            @include('backend.freelancer.settings.account')
                        </div>
                        <div class="tab-pane" id="3b">
                            @include('backend.freelancer.settings.users')
                        </div>
                        <div class="tab-pane" id="4b">
                            @include('backend.freelancer.settings.payments')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DEMO Installation Modal -->
    <div class="modal fade" id="demo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" id="modal-body">
                    @include('backend.freelancer.setup.demo')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" role="form" method="POST" action="/freelancer/settings/reset">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section("javascript")
    <script>

        $( document ).ready(function() {
            loadScrips();
        });

        function loadScrips(){

            //loads content for shortcuts
            $(".load-content").click(function() {
                getContent($(this).attr('id'));
            })

        }

        function getContent($url){

            //alert($url);

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                    document.getElementById("content-container").innerHTML = xmlhttp.responseText;
                    loadScrips();
                }
            };

            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade['ll']}}/provider/settings/"+ $url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }

        $("#install-demo").on("click", function() {

            installDemo();

            $('#setup-modal').modal('hide');
            $('#demo-modal').modal('show');

            $(".demo-company-loading").addClass("").delay(1000).queue(function(next){
                $(".demo-company-loading").addClass("d-none")
                $(".demo-company-done").removeClass("d-none")
                next();
            });

            $(".demo-clients-loading").addClass("").delay(2000).queue(function(next){
                $(".demo-clients-loading").addClass("d-none")
                $(".demo-clients-done").removeClass("d-none")
                next();
            });

            $(".demo-projects-loading").addClass("").delay(3000).queue(function(next){
                $(".demo-projects-loading").addClass("d-none")
                $(".demo-projects-done").removeClass("d-none")
                next();
            });

            $(".demo-plans-loading").addClass("").delay(4000).queue(function(next){
                $(".demo-plans-loading").addClass("d-none")
                $(".demo-plans-done").removeClass("d-none")
                $("#get-started").removeClass("btn-disable").addClass("btn-classic")
                next();
            });

        });


        function installDemo() {

            $.ajax({
                type: 'GET',
                url: '{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/demo/install',
                data: { variable: 'value' },
                dataType: 'json',

                success: function(data) {
                    var items = data["data"];
                    $("#marker-client").text(items["firstname"] + " " + items["lastname"] + " - Contractor");
                }
            });
        }


        $("#get-started").on("click", function() {
            $("#demo-modal").modal('hide');
            location.reload();
        });

        $(".reset-account").on("click", function() {
            $("#delete-modal").modal('show');
        });

    </script>

@stop