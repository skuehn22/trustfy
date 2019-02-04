@extends('backend.masters.freelancer')
@section('seo')
@stop
@section('css')

@stop

@section('content')
    <div class="settings">
        <div class="row">
            <div class="col-md-8">
                <h3 class="pb-5">Settings</h3>
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

@stop
@section("js")
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

    </script>

@stop