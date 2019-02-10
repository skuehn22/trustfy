@extends('backend.masters.freelancer')
@section('seo')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
@stop
@section('css')

    <style>
        .sw-theme-arrows .sw-container {
            min-height: 40px;
        }

        .sw-theme-default > ul.step-anchor > li {
            position: relative;
            margin-right: 2px;
            padding: 9px;
        }

        .sw-theme-default .sw-container {
            min-height: auto;
        }

        .sw-theme-default .sw-toolbar {
            background: #f9f9f9;
            border-radius: 0 !important;
            padding-left: 10px;
            padding-right: 10px;
            padding: 10px;
            margin-bottom: 0 !important;
        }

        .sw-theme-default ul {
            -webkit-columns: 2;
            -moz-columns: 2;
            columns: 2;
        }

        .menu-icons button{
            width: 115px;
        }

        .menu-icons i {
            font-size: 15px;
            color: #fff;
            padding: 5px;
        }

        .sw-theme-default > ul.step-anchor > li.active > a {
            border: none !important;
            color: #006600 !important;
            background: transparent !important;
            cursor: pointer;
        }

        hr{
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 90px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ca2222;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2ab934;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(55px);
            -ms-transform: translateX(55px);
            transform: translateX(55px);
        }

        /*------ ADDED CSS ---------*/
        .on
        {
            display: none;
        }

        .on, .off
        {
            color: white;
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            font-size: 10px;
            font-family: Verdana, sans-serif;
        }

        input:checked+ .slider .on
        {display: block;}

        input:checked + .slider .off
        {display: none;}

        /*--------- END --------*/

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;}

    </style>
@stop

@section('content')
    <div class="plans pl-4">
        <div class="row">

        </div>

        <div class="row">
            <div class="col-md-12 p-0">


                    <div id="smartwizard" class="sw-main sw-theme-default">
                        <ul id="arrows" class="nav nav-tabs step-anchor">
                            <li><a href="#step-1">Step 1<br /><small>General Informations</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Configuration Payment Plan</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Upload Documents</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>Completion of creation</small></a></li>
                            <li class="right;"></li>
                        </ul>



                        <div class="col-md-12 btn-toolbar sw-toolbar sw-toolbar-top justify-content-end  menu-icons" style="text-align: right;">

                            <div class="btn-group mr-2 sw-btn-group" role="group" >
                                <button class="btn btn-secondary cancel-plan button-menu" id="cancel"><i class="fas fa-ban"></i> Close</button>
                                <button class="btn btn-success save-plan button-menu" id="save"><i class="fas fa-save"></i> Save</button>
                            </div>

                            <div class="btn-group mr-2 sw-btn-group" role="group" >
                                <button class="btn btn-alternative" id="preview-btn"><i class="fas fa-search"></i>Preview</button>
                            </div>

                        </div>

                        <div class="sw-container tab-content">

                            <form method="post" id="upload_form" enctype="multipart/form-data">
                            <div id="step-1" class="tab-pane step-content">
                                @include('backend.freelancer.plans.general-infos')
                            </div>

                            <div id="step-2" class="tab-pane step-content">
                                @include('backend.freelancer.plans.payment-infos')
                            </div>

                            <div id="step-3" class="tab-pane step-content">
                                @include('ajax_file_upload')
                            </div>
                            <div id="step-4" class="tab-pane step-content">
                                @include('backend.freelancer.plans.finishing')
                            </div>
                                <input type="hidden" id="plan" name="plan" value="{{$plan->id}}">
                            </form>
                        </div>
                    </div>
            </div>
        </div>



    </div>

    <!-- Modal -->
    <div class="modal fade" id="saved-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog preview-modal" role="document"  style="width: 200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body preview-body">
                    <div class="col-md-12">
                        <div id="msg">Saved!</div>    <button type="submit" class="btn btn-success close-saved">Cool</button>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="preview-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog preview-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body preview-body">
                    <div id="page1">
                        <div class="col-md-12 plan-preview align-middle">
                            <div class="col-md-12 p-0 pt-5 text-md-center">
                                <br><br><br><br><h3 class="font-italic text-secondary">-Preview-</h3>
                                <br><br><br><br><br> <br>
                                @if(isset($blade["user"]->logo))
                                    <img src="/uploads/companies/logo/{{$blade["user"]->logo}}" style="width:300px;">
                                @endif
                                <br><br><br><br><br><br>
                                <h4>Payment Plan</h4>
                                <br><br>
                                <div id="marker-creation-date"><span class="font-italic">--please select date--</span></div>
                                <br><br>
                                <p>between</p>
                                <p><strong>{{$blade["user"]->firstname}} {{$blade["user"]->lastname}} - Principal</strong></p>
                                <p>and</p>
                                <div><strong id="marker-client"><span class="font-italic">--please select client--</span></strong></div>
                                <div class="preview-project">
                                    <br><br><br><br>
                                    <h3>Project</h3>
                                    <div id="marker-project"><span class="font-italic">--please select project--</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="page2" class="plan-preview ">
                        <div class="col-md-12 float-right text-right">
                            @if(isset($blade["user"]->logo))
                                <img src="/uploads/companies/logo/{{$blade["user"]->logo}}" style="width: 220px; padding-top: 55px; padding-right: 55px;">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <h4>Payment Plan</h4>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    @include('backend.freelancer.modals.create-client')



@stop
@section("javascript")

    <script>

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

        //initalize the arrow bar on the top of the modal
        $('#smartwizard').smartWizard("theme", "default");

        // External Button Events
        $(".next-btn").on("click", function() {
            // Reset wizard
            $('#smartwizard').smartWizard("next");
            return true;
        });

        $(".prev-btn").on("click", function() {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;
        });


        $( document ).ready(function() {
            loadScript();
            $('.btn-group').removeClass("step-content");


        });

        // External Button Events
        $("#create-client-fly").on("click", function() {
            $('#create-client-modal').modal('show');
        });

        // External Button Events
        $(".close-saved").on("click", function() {
            $('#saved-modal').modal('hide');
        });



        //topmenu
        $(document).on("click", ".button-menu", function () {

            event.preventDefault();
            $.ajax({
                url:"{{ route('freelancer.plans.save') }}",
                method:"GET",
                data:$('#upload_form').serialize(),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    $('#msg').html(data.message);
                    $('#saved-modal').modal('show');
                }
            })

            //var url = "/en/freelancer/plans/" + $(this).attr("id") + "/" + $("#plan").val();
            //$('#plan-settings').attr('action', url).submit();

        });

        //load preview
        $("#preview-btn").on("click", function() {
            $('#preview-modal').modal('show');
        });


        //adds tolltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        //initalize datepicker
        $( function() {
            $( "#creation-date" ).datepicker();
        } );

        //loads projects for selected client
        $("#creation-date").on('change', function() {
            document.getElementById("marker-creation-date").innerHTML = "Date: " + $(this).val();
        });




        //loads projects for selected client
        $("#typ").on('change', function() {
            getPlanTyp($(this).val());
        });




        //load scripts after a ajax call
        function loadScript(){

            //loads projects for selected client
            $("#clients").on('change', function() {
                document.getElementById("projects").innerHTML = "";
                action('projects/by-client',  $(this).val());
                insertdata('clients/get-by-id-client',  $(this).val());
            });

            $("#projects-dropwdowm").on('change', function() {
                //action('projects/by-client',  $(this).val());
                insertdata('projects/get-by-id',  $(this).val());
            });

            $( function() {
                $( "#due-date" ).datepicker();
            } );

            //loads projects for selected client
            $("#pay-due").on('change', function() {

                if($(this).val() == 3){
                    loadScript();
                    $(".due").removeClass( "d-none" )
                    $(".amount").removeClass( "d-none" )
                }else{
                    $(".amount").removeClass( "d-none" )
                }
            });

            $(document).ready(function () {
                var counter = 0;

                $("#addrow").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
                    cols += '<td><input type="text" class="form-control" name="amount' + counter + '"/></td>';
                    cols += '<td><input type="text" class="form-control" id="due_date' + counter + '" name="due_date' + counter + '"/></td>';
                    cols += '<td><textarea class="form-control" rows="3" name="description' + counter + '"></textarea></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.order-list").append(newRow);
                    $( "#due_date" + counter).datepicker();
                    counter++;


                });



                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });


            });



            function calculateRow(row) {
                var price = +row.find('input[name^="price"]').val();

            }

            function calculateGrandTotal() {
                var grandTotal = 0;
                $("table.order-list").find('input[name^="price"]').each(function () {
                    grandTotal += +$(this).val();
                });
                $("#grandtotal").text(grandTotal.toFixed(2));
            }

            //initalize datepicker
            $( function() {
                $( "#due_date" ).datepicker();
            } );



        }


        function getPlanTyp(id) {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("plan-typ-response").innerHTML = xmlhttp.responseText;
                    loadScript();
                }
            }


            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/get-plan-typ/?typ="+id, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
        }




        //inserts data in the preview
        function insertdata(url, id) {

            $.ajax({
                type: 'GET',
                url: '{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/'+url+'/?id='+id,
                data: { variable: 'value' },
                dataType: 'json',

                success: function(data) {

                    var items = data["data"];

                    switch(url) {

                        case 'clients/get-by-id-client':

                            $("#marker-client").text(items["firstname"] + " " + items["lastname"] + " - Contractor");
                            break;

                        case 'projects/get-by-id':

                            $("#marker-project").text('"'+items["name"]+'"');
                            $(".preview-project").removeClass( "d-none" );
                            break;

                        default:
                            break;
                    }
                }
            });
        }

        function savePlan() {

            var plan =  $("#plan").val();

            $.ajax({

                type: 'GET',
                url: '{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/save/'+plan,
                data: { variable: 'value' },
                dataType: 'json',
                success: function(data) {

                    var items = data["project"];

                }
            });

        }




        function action(url, id) {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    switch(url) {
                        case 'projects/by-client':
                            document.getElementById("projects").innerHTML = xmlhttp.responseText;
                            loadScript();
                            break;
                        case 'clients/get-by-id':
                            var client = JSON.parse(xmlhttp.responseText);
                            loadScript();
                            break;
                        default:
                        // code block
                    }
                }
            }

            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/"+url+"/?id="+id, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
        }




    </script>
@stop
