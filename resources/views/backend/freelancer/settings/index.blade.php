@extends('backend.masters.freelancer')
@section('seo')
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css">

    <style>

    .modal-content {
        min-height: 200px;
    }

    .input-group-addon {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    </style>

@stop
@section('content')
    <div class="settings">
        <div class="row">
            <div class="col-md-12">
                <div id="exTab3">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Company</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Banking</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> @include('backend.freelancer.settings.company')</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> @include('backend.freelancer.settings.account')</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> @include('backend.freelancer.settings.payments')</div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>
    <script>

        $( document ).ready(function() {
            loadScripts();
        });

        function loadScripts(){

            $(function () {
                $('#color-picker-component').colorpicker();
            });

            //loads content for shortcuts
            $(".load-content").click(function() {
                getContent($(this).attr('id'));
            })

            $('#upload_form').on('submit', function(event){

                event.preventDefault();
                $.ajax({
                    url:"{{ route('ajaxupload.action') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        $('#uploaded_image').html('');
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        $('.old_image').remove();
                        $('#uploaded_image').html(data.uploaded_image);
                        loadScripts();
                    }
                })
            });

            $('#delete-image').on('click', function(event){

                var doc = $(this).data('name');

                event.preventDefault();
                $.ajax({
                    url:"{{ route('ajaxupload.delete') }}",
                    method:"GET",
                    data: { variable: doc },
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        $('#uploaded_image').html(" ");
                    }
                })
            });

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
                    loadScripts();
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