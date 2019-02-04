@extends('backend.masters.freelancer')
@section('seo')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
@stop
@section('css')

    <style>

    </style>
@stop

@section('content')
    <div class="plans pl-4">
        <div class="row">
            <div class="col-md-6 p-0 ">
                <button class="btn btn-success save-plan button-menu" id="save"><i class="fas fa-edit"></i> Save</button>
                <button class="btn btn-outline-secondary save-close button-menu" id="sclose"><i class="fas fa-check"></i> Save & Close</button>
                <button class="btn btn-outline-secondary cancel-plan button-menu" id="cancel"><i class="fas fa-ban"></i> Cancel</button>
                <hr>
            </div>
            <div class="col-md-6 p-0 float-right text-right">
                <button class="btn btn-alternative" id="preview-btn"><i class="fas fa-search"></i>Preview</button>
            </div>
        </div>
        <form action="/{{$blade["ll"]}}/freelancer/plan/save/{{$plan->id}}" id="plan-settings">
        <div class="row">
            <div class="col-md-3 p-0 menu-icons">

                    <div class="form-row py-2 pt-3 pl-0 ml-0">
                        <h5>General Informations</h5>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-3 col-form-label" for="creation-date">Date</label>
                        <input type="text" id="creation-date" name="creation-date" class="form-control col-md-8">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-3 col-form-label" for="clients">Client</label>

                        @if(count($clients)>0)
                            <select name="clients" id="clients" class="col-md-8">
                                <option value="0">select</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
                                @endforeach
                            </select>
                        @else
                            <div class="pt-2">
                                No clients created yet. <a href="/{{$blade["ll"]}}/freelancer/clients/new">Create Client</a>
                            </div>
                        @endif
                    </div>
                    <div id="projects"></div>


            </div>

            <div class="col-md-1">

            </div>
            <div class="col-md-8">

                <div class="form-row py-2 pt-3 pl-0 ml-0">
                    <h5>Payment Plan</h5>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="typ">Typ</label>
                    {!! Form::select('typ', $types, 1 , ['class' => 'form-control col-md-6', 'id' => 'typ']) !!}
                </div>
                <div id="plan-typ-response"></div>
            </div>
        </div>
        </form>
    </div>
        <input type="hidden" id="plan" name="plan" value="{{$plan->id}}">
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

@stop
@section("javascript")

    <script>

        //topmenu
        $(document).on("click", ".button-menu", function () {

            var url = "/en/freelancer/plans/" + $(this).attr("id") + "/" + $("#plan").val();
            $('#plan-settings').attr('action', url).submit();

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
        $("#clients").on('change', function() {
            document.getElementById("projects").innerHTML = "";
            action('projects/by-client',  $(this).val());
            insertdata('clients/get-by-id-client',  $(this).val());
        });


        //loads projects for selected client
        $("#typ").on('change', function() {
            getPlanTyp($(this).val());
        });




        //load scripts after a ajax call
        function loadScript(){

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