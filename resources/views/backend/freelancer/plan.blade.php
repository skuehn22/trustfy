@extends('backend.masters.freelancer')
@section('seo')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
@stop
@section('css')

    <style>

    </style>
@stop
@section('breadcrumb')
    Dashboard
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
               test
            </div>
        </div>

    </div>



@stop
@section("js")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script>

        $( document ).ready(function() {
            loadScrips();
        });

        function loadScrips(){

        }

        function action(url, data){

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
            };


            urlAddress = "{{env("MYHTTP")}}/{{$blade['locale']}}/provider/" + url;


            if(data != null && Object.keys(data).length > 0) {

                urlAddress += "?";

                for (var k in data) {
                    urlAddress += k + "=" + data[k] + "&";
                }

                urlAddress = urlAddress.slice(0, -1);

            }

            xmlhttp.open("GET", urlAddress, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }

    </script>

@stop