@extends('backend.master')
@section('seo')
@stop
@section('css')

@stop

@section('content')

<div class="container dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="far fa-envelope"></i> Settings</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section("js")



    <script>

        //loads content for shortcuts
        $(".modal-btn").click(function() {
            getModalContent($(this).attr('id'));
        })

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