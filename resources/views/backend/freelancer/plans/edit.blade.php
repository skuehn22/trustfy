@extends('backend.masters.freelancer')
@section('seo')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
@stop
@section('css')

    <style>

    </style>
@stop

@section('content')
    <div class="plans">
        <div class="row section-heading">
            <div class="col-md-6 p-0 menu-icons">
                <button class="btn btn-success save-plan button-menu" id="save"><i class="fas fa-edit"></i> Save</button>
                <button class="btn btn-outline-secondary save-close button-menu" id="sclose"><i class="fas fa-check"></i> Save & Close</button>
                <button class="btn btn-outline-secondary cancel-plan button-menu" id="cancel"><i class="fas fa-ban"></i> Cancel</button>
                <hr>
                <form action="/{{$blade["ll"]}}/freelancer/plan/save/{{$plan->id}}" id="plan-settings">
                    <div class="form-row py-2 pt-3 pl-0 ml-0">
                        <h5>General Informations</h5>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label" for="clients">Client</label>

                        @if(count($clients)>0)
                            <select name="clients" id="clients" class="col-md-6">
                                <option value="0">select</option>
                                @foreach($clients as $client)
                                    @if($plan->clients_id_fk == $client->id)
                                        <option value="{{$client->id}}" selected>{{$client->firstname}} {{$client->lastname}}</option>
                                    @else
                                        <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <div class="pt-2">
                                No clients created yet. <a href="/{{$blade["ll"]}}/freelancer/clients/new">Create Client</a>
                            </div>
                        @endif

                    </div>

                    <div id="projects"></div>

                    <!--
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label" for="name">Name</label>
                        <input type="text" class="form-control col-md-10" id="name" name="name">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="description">Description</label>
                        <textarea class="form-control col-md-10" rows="5" id="description" name="description"></textarea>
                    </div>
                    <div class="form-row py-2">
                        <h5>Address optional</h5>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="address">Street</label>
                        <input type="text" class="form-control col-md-10" id="street" name="street">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="city">City</label>
                        <input type="text" class="form-control col-md-10" id="city" name="city">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="country">Country</label>
                        <input type="text" class="form-control col-md-10" id="country" name="country">
                    </div>
                    <button type="submit" class="btn btn-default float-right text-right">Save Project</button>
                    -->
                </form>
            </div>

            <div class="col-md-1">

            </div>
            <!-- right side - PREVIEW -->
            <div class="col-md-5 plan-preview">
                <div class="col-md-12 p-0 pt-5 text-md-center">
                    <h5 class="font-italic">-Preview-</h5>
                    <h5>Payment Plan</h5>
                    <p>between</p>
                    <p>{{$blade["user"]->firstname}} {{$blade["user"]->lastname}} - Principal</p>
                    <p>and</p>
                    <div id="client"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

            </div>


        </div>
        <input type="hidden" id="plan" name="plan" value="{{$plan->id}}">
    </div>
@stop
@section("js")

    <script>

        $(document).on("click", ".button-menu", function () {

            var url = "/en/freelancer/plans/" + $(this).attr("id") + "/" + $("#plan").val();
            $('#plan-settings').attr('action', url).submit();

        });

        $("#clients").on('change', function() {

            action('projects/by-client',  $(this).val());
            insertdata('clients/get-by-id',  $(this).val());

        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


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

        function insertdata(url, id) {

            document.getElementById("projects").innerHTML = "";

            $.ajax({
                type: 'GET',
                url: '{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/'+url+'/?id='+id,
                data: { variable: 'value' },
                dataType: 'json',
                success: function(data) {

                    var items = data["project"];
                    $("#client").text(items["firstname"] + " " + items["lastname"] + " - Contractor");
                    $(".red").css('color', 'red');

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
                            break;
                        case 'clients/get-by-id':
                            var client = JSON.parse(xmlhttp.responseText);



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