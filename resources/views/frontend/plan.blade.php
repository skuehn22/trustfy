@extends('frontend.masters.master-trustfy')
@section('seo')
    <title>{!! trans('seo.title_about') !!}</title>
    <meta name="description" content="{!! trans('seo.desc_about') !!}">
    <meta name="keywords" content="{!! trans('seo.keywords_about') !!}">

@endsection


@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        h5{
            font-size: 14px;
        }

        .heading{
            font-family: Catamaran,Helvetica,Arial,sans-serif;
            font-weight: 200;
            letter-spacing: 1px;
            font-size: 14px;
        }

        .add-row{
            color: #19A3B8;
            background-color: #fff;
            border-color: #19A3B8;
            width: 148px;
            font-size: 14px;
            border-radius: 0px;
            padding: 0px;
        }

        input.btn.btn-lg, input.btn.btn-lg:focus {
            outline: 0;
            width: 100%;
            height: 36px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border: 1px solid #9d959a;
            padding: 0px;
        }



        /* This is the checked state */
        .custom-radio .custom-control-input:checked~.custom-control-label::before,
        .custom-radio .custom-control-input:checked~.custom-control-label::after {
            background-color: #19A3B8;  /* green */
            /* this bg image SVG is just a white circle, you can replace it with any valid SVG code */
            background-image: url(data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='%23fff'/%3E%3C/svg%3E);
            border-radius: 50%;
        }

        /* active state i.e. displayed while the mouse is being pressed down */
        .custom-radio .custom-control-input:active ~ .custom-control-label::before {
            color: #fff;
            background-color: #ff0000; /* red */
        }

        /* the shadow; displayed while the element is in focus */
        .custom-radio .custom-control-input:focus ~ .custom-control-label::before {
            box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(255, 123, 255, 0.25); /* pink, 25% opacity */
        }

    </style>

@endsection

@section('content')

    <div class="container content-container" style="background-color: #f7f7f7; padding-bottom: 120px; margin-top: 80px; max-width: 800px;">
        <form class="form-horizontal" role="form" method="POST" action="{{ url($blade["locale"].'/save-plan') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-12 col-md-12 pt-5 pl-5 pr-5">
                @if(Session::has('error'))
                    <div class="alert alert-danger error_message">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success error_message">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {!!  Session::get('success') !!}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">

                        <h2>Create your Escrow</h2>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pb-4 pt-4">

                        <div class="form-inline">
                            <div class="custom-control custom-radio pr-5">
                                <input type="radio" class="custom-control-input" id="radio-type-new" name="radio-new" value="0" checked>
                                <label class="custom-control-label" for="radio-type-new">I am a new user</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="radio-type-returning" name="radio-new" value="1">
                                <label class="custom-control-label" for="radio-type-returning">I am a returning user</label>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Your E-Mail Address</h5>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                            </div>
                            <input id="email" type="email" class="form-control col-md-12" name="email" value="{{ old('email') }}">
                        </div>



                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h5 id="password">Please enter a new password</h5>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input id="password" type="password" class="form-control col-md-12" name="password">
                        </div>


                        @if ($errors->has('password'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('password') }}</strong>
                             </span>
                        @endif
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="pt-4">Are you a Freelancer or a Client?</h5>



                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="radio-type-freelancer" name="radio-type" value="0"  @if(isset($type) && $type==0) checked @endif>
                            <label class="custom-control-label" for="radio-type-freelancer">Freelancer</label>
                        </div>


                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="radio-type-client" name="radio-type" value="1"  @if(isset($type) && $type==1) checked @endif>
                            <label class="custom-control-label" for="radio-type-client">Client</label>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="pt-4">The <span class="email-txt">Clients</span> E-Mail Address</h5>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                    </div>
                                    <input type="email" id="email" name="client-email" class="form-control col-md-5" required>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="pt-4">What is the Project about?</h5>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">   <i class="fas fa-pen"></i></div>
                            </div>
                            <input class="form-control col-md-5" id="title" name="title" type="text" placeholder="e.g. Create a Website">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="pt-4">Payment Typ</h5>
                        <select id="typ" name="typ" class="form-control col-md-12">
                            <option value="1" @if(isset($plantype) && $plantype==0) selected @endif>
                                Deposit / Single Payment
                            </option>
                            <option value="2" @if(isset($plantype) && $plantype==1) selected @endif>
                                Milestone Payment
                            </option>
                        </select>


                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="plan-typ-response"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="pt-4">Personal Message</h5>
                        <textarea class="form-control col-md-12" rows="4"  name="comment" id="comment" placeholder="Hi John, &#10;I'm really looking forward to working together! &#10;Best,&#10;Jane"></textarea>
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-2 pt-4">
                       <input type="submit" class="btn btn-create" value="{{ trans('index.header-form5') }}">
                   </div>
               </div>

            </div>
        </div>
        </form>
    </div>
    <br><br><br><br><br><br>

@endsection
@section("javascript")

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/js/freelancer/main.js"></script>
    <script src="/js/freelancer/menu-aim.js"></script>


    <!-- Include jQuery -->
    <script src="https://unpkg.com/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script src="/js/freelancer/jquery.smartWizard.min.js"></script>

    
    <script>

        //loads projects for selected client
        $("#typ").on('change', function() {

            if($("#typ").val() == 1 || $("#typ").val() == 2){
                getPlanTyp($(this).val());
            }

        });


        $(document).ready(function () {

            //alert($("#typ").val());

            if($("#typ").val() == 1 || $("#typ").val() == 2){
                getPlanTyp($("#typ").val());
            }

        });


        function getPlanTyp(id) {


            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("plan-typ-response").innerHTML = xmlhttp.responseText;


                    if(id == 1){
                        $(".button-bar-footer").removeClass("col-md-12").addClass("col-md-5");
                    }else{
                        $(".button-bar-footer").removeClass("col-md-5").addClass("col-md-12");
                    }

                    @if(isset($milestones_edit->due_typ))
                    $("#pay-due").val({{$milestones_edit->due_typ}});
                    $(".amount").removeClass("d-none");
                    getDocs({{$plan->id}});
                    @endif

                    loadScript();

                }
            };

            @if(isset($milestones_edit->due_typ))
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["locale"]}}/get-plan-typ/?typedit="+id, true);
            @else
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["locale"]}}/get-plan-typ/?typ="+id, true);
            @endif

            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
        }


        $('#radio-type-freelancer,#radio-type-client').on('change', function () {

            if($(this).val() == 1){
                $('.email-txt').html("Freelancers");
            }else{
                $('.email-txt').html("Clients");
            }

        })


        $('#radio-type-new,#radio-type-returning').on('change', function () {

            if($(this).val() == 0){
                $('#password').html("Please enter a new password");
            }else{
                $('#password').html("Please enter your password");
            }

        })






        function loadScript(){

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })




            @if(isset($amount))
                $( "#single-amount" ).val({{$amount}});
            @endif


            //initalize datepicker
            $( function() {
                $( "#due_date" ).datepicker( );
                $( "#due_date" ).datepicker( "option", "dateFormat", "mm/dd/yy" );
                $('#due_date').datepicker('setDate', new Date());
            } );

            $(document).ready(function () {
                var counter = 1;

                $("#addrow").on("click", function () {



                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td><input type="text" class="form-control" name="name[]"/></td>';
                    cols += '<td><input type="number" class="form-control" name="amount[]"/></td>';
                    cols += '<td class="col-sm-1 col-lg-1"  style="width: 9%"><select name="currency[]" id="currency[]" class="form-control"><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="USD">USD</option></select></td>';
                    cols += '<td><input type="text" class="form-control" id="due_date' + counter + '" name="due_date[]"/></td>';
                    cols += '<td><textarea class="form-control" rows="3" name="description[]"></textarea></td>';
                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="-"></td>';

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

        }

    </script>

@endsection
