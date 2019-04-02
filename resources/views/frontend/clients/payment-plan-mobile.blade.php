@extends('frontend.masters.paymentplan')

@section('seo')
    <title>Trustfy Login</title>
@endsection


@section('css')

    <style>

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            width: 25px;
        }

        .invoice table .total {
            background:@if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            color: #fff
        }

        .invoice table tfoot tr:last-child td {
            color: #006600;
            font-size: 1.4em;
            border-top: 1px solid @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
        }

        .pay-now{
            color: #fff;
        }


        .pay-now a{
            color: #fff;
        }


        .modal-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid #acb1b7;
            border-top-left-radius: .3rem;
            border-top-right-radius: .3rem;
            background-color: #ded9d9;
        }


    </style>


@endsection

@section('content')

    <div class="row blur" id="invoice">
        <!--
            <div class="toolbar hidden-print">
                <div class="text-right">
                    <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                    <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                </div>
                <hr>
            </div>-->
        @if(isset($preview))
            <div class="col col-lg-12 invoice overflow-auto">
                @else
                    <div class="col col-lg-9 col-md-12 col-sm-12 invoice overflow-auto">
                        @endif

                        <header>
                            @if(Session::has('error'))
                                <div class="alert alert-danger error_message">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if(Session::has('success'))
                                <div class="alert alert-success success_message">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if(isset($protect) && $protect == true)
                                <div class="alert alert-success success_message">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    Thank you. The Payment Plan Protection is now active.
                                </div>
                            @endif

                            <div class="alert alert-success success_message reminder-alert d-none">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                Check your inbox for the payment instructions!
                            </div>

                            <div class="row">
                                <div class="col">
                                    @if(isset($company->logo) && $company->logo!="3.png")
                                        @if( file_exists(public_path('uploads/companies/logo/'.$company->logo)))
                                            <img src="{{ asset('uploads/companies/logo/'.$company->logo)}}" data-holder-rendered="true" style="width: 200px;" />
                                        @endif
                                    @endif
                                </div>
                                <div class="col company-details">
                                    <h3 class="name">
                                        {!! $company->name or '<i>please fill in</i>' !!}
                                    </h3>
                                    <div>
                                        {{$company->address1 or ''}}<br>
                                        @if(strlen($company->address2)>1){{$company->address2 or ''}}<br> @endif
                                        @if(strlen($company->postcode)>1) {{$company->postcode or ''}}, <br>@endif
                                        {{$company->city or ''}}
                                    </div>
                                    <div>  {{$user->email or ''}}</div>
                                    <div> {{$user->phone or ''}}</div>
                                </div>
                            </div>
                        </header>


                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    @if(isset($plan->lastname) && $plan->lastname!=" ")


                                        <h5 class="to">{{$plan->firstname}} {{$plan->lastname}}</h5>
                                        {{$plan->address1 or ''}}<br>
                                        @if(strlen($plan->address2)>1){{$plan->address2 or ''}}<br> @endif
                                        @if(isset($plan->postcode) && strlen($plan->postcode)>1) {{$plan->postcode or ''}}@endif
                                        {{$plan->city}}
                                        <div class="email">{{$plan->email}}</div>
                                    @else
                                        <i>please fill in</i>
                                    @endif
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">Payment Plan</h1>
                                    <div class="date">Date of Invoice: {{ \Carbon\Carbon::parse($plan->date)->format('d/m/Y')}} </div>

                                </div>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id"style="text-align: left; padding-top: 25px; padding-bottom: 10px;">{{$plan->name}}</h1>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    #
                                </div>
                                <div class="col-5">
                                    Name
                                </div>
                                <div class="col-4">
                                    Amount
                                </div>
                                <div class="col-1">

                                </div>
                            </div>

                            @foreach($milestones as $milestone)

                                <div class="row">
                                    <div class="col-2">
                                        0{{ $milestone->order }}
                                    </div>
                                    <div class="col-5">
                                        <strong>{!!  $milestone->name or '<i>please fill in</i>'!!} </strong>
                                    </div>
                                    <div class="col-4">
                                        @if(isset($milestone->amount))€ {{ number_format($milestone->amount, 2, '.', ',') }}@else  <i>please fill in</i> @endif
                                    </div>
                                    <div class="col-1">
                                        <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fas fa-angle-double-down"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        Test
                                    </div>
                                </div>

                            @endforeach




                            @if(isset($docs) && count($docs)>0)

                                <div class="docs">

                                    Please note the following binding documents:

                                    @if(isset($docs))
                                        @foreach($docs as $doc)

                                            <p class="{{$doc->id}}" style="margin: 0px;">
                                                <a target="_blank" href="/uploads/companies/contracts/{{$plan->id}}/{{$doc->filename}}">{{$doc->name}}</a>
                                                <a href="#" data-id="{{$doc->id}}" data-toggle="tooltip" data-placement="top" title="" class="delete-doc" data-original-title="Delete">
                                                    <i class="fas fa-trash green"></i>
                                                </a>
                                            </p>

                                        @endforeach
                                    @endif

                                </div>

                            @endif

                            <div class="thanks pt-3">Thank you!</div>
                            @if($plan->comment!=null)
                                <div class="notices">
                                    <div>NOTICE:</div>
                                    <div class="notice">{{$plan->comment}}</div>
                                </div>
                            @endif
                        </main>
                        <footer>
                            Payment Plan was created on a computer and is valid without the signature and seal.
                            <p class="more"><a href="https://www.trustfy.io" target="_blank">Learn more about trustfy.io</a></p>
                        </footer>

                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>


            </div></div>


    <!-- Modal -->
    <div class="modal fade" id="protect-plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title-msg" id="modal-title-msg">Secure your plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"  id="modal-body-msg">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/protect-plan') }}">
                        {{ csrf_field() }}
                        <p>To protect your plan from unauthorized access please define your documents protection</p>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Enter a E-Mail</label>

                            <div class="col-md-12 pl-0">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Choose a Password</label>

                            <div class="col-md-12  pl-0">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 register  pl-0">
                                <button id="set-protection" type="button" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> continue
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login-plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="alert alert-error login-error d-none">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <div class="login-error-msg"></div>
                    </div>
                    <h5 class="modal-title-msg" id="modal-title-msg">Log into your plan</h5>
                </div>
                <div class="modal-body"  id="modal-body-msg">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login-plan') }}">
                        {{ csrf_field() }}
                        <p>Your plan was protected. Please log in</p>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">E-Mail</label>

                            <div class="col-md-12 pl-0">

                                <input id="email-login" type="email" class="form-control" name="email-login">
                                <input type="hidden" value="{{$hash or ''}}" name="hash" id="hash">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password-login" class="col-md-12 control-label">Password</label>

                            <div class="col-md-12  pl-0">
                                <input id="password-login" type="password" class="form-control" name="password-login">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 register  pl-0">
                                <button id="log-protection" type="button" class="btn btn-success">
                                    <i class="fa fa-btn fa-user"></i> continue
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="release-money" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="alert alert-error login-error d-none">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <div class="login-error-msg"></div>
                    </div>
                    <h5 class="modal-title-msg" id="modal-title-msg">Milestone Completed</h5>
                </div>
                <div class="modal-body"  id="modal-body-msg">
                    <form class="form-horizontal" id="release-form" role="form" method="POST" action="/payment-plan/release-milestone/{hash}">
                        {{ csrf_field() }}

                        <div class="form-check form-check-inline">
                            <div id="milestone-done" name="milestone-done" class="pr-5"></div>
                            <button id="do-release" type="submit" class="btn btn-success">
                                <span class="ui-button-text">My Text</span>
                            </button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="bank-transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bank Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"  id="modal-bank-content">


                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        @if(isset($login))

        @if( (!$login && $plan->protection == 'show'))

        $('#protect-plan').modal('show');

        @elseif(!$login && $plan->protection == 'hide')


        @if( isset($loggedIn) && $loggedIn == "true" )

        $('#invoice').removeClass('blur');

        @else

        $('#login-plan').modal('show');

        @endif

        @endif


        @if( isset($protect) && $protect == "true" )
        $('#invoice').removeClass('blur');
        @endif

        @endif

        //loads projects for selected client

        $('input[type=radio][name=paymenttyp]').change(function() {


            if($(this).val() == 1){
                $('#paymentform').attr('action', '/payment-plan/pay-by-card/{{$plan->hash}}');
            }else{
                if($(this).val() == 2){
                    $('#paymentform').removeAttr('action');
                }else{
                    $('#paymentform').removeAttr('action');
                }
            }

        });

        // External Button Events
        $("#set-protection").on("click", function() {
            setProtection({{$plan->hash}});
            return true;
        });

        // External Button Events
        $("#log-protection").on("click", function() {
            loginPlan({{$plan->hash}});
            return true;
        });

        // External Button Events
        $(".work-done").on("click", function() {

            var id = $(this).attr("id");
            var amount=  $('#amount_name_'+id).val();
            var name =   $('#name_'+$(this).attr("id")).val();

            $('#release-form').attr('action', '/payment-plan/release-milestone/'+id);
            $('#milestone-done').html("Milestone: " +name);
            $("#do-release span").text("Release " +amount);

            $('#release-money').modal('show');
            return true;
        });


        function setProtection(hash) {

            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                type: 'GET',
                url: '{{env("MYHTTP")}}/{{$blade["locale"]}}/protect-plan?email='+email+'&password='+password+'&hash='+hash,
                data: { hash: hash },
                dataType: 'json',
                success: function(data) {

                    if(data.success == true){
                        window.location.href = window.location.href + "?protect=true";
                    }else{
                        alert("Fehler");
                    }
                }
            })
        }


        // External Button Events
        $(".pay-now").on("click", function() {

            if(!jQuery('#paymentform').get(0).hasAttribute('action')){

                var id  = $(this).attr("name");

                getBankTransfer({{$plan->hash}}, id);

                $('#bank-transfer').modal('show');

            }else{

                $( "#paymentform" ).submit();

            }
        });


        function getBankTransfer(hash, id) {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("modal-bank-content").innerHTML = xmlhttp.responseText;
                    loadScript();
                }
            }

            xmlhttp.open("GET", "{{env("MYHTTP")}}/{{$blade["locale"]}}/payment-plan/bank-transfer/"+hash+"?val="+id, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }

        function loginPlan(hash) {

            var email = $("#email-login").val();
            var password = $("#password-login").val();

            $.ajax({
                type: 'GET',
                url: '{{env("MYHTTP")}}/{{$blade["locale"]}}/login-plan?email='+email+'&password='+password+'&hash='+hash,
                data: { hash: hash },
                dataType: 'json',
                success: function(data) {

                    if(data.success == true){
                        window.location.href = window.location.href + "?login="+data.msg;
                    }else{
                        alert("The input does not match the plan.");
                    }
                }
            })
        }


        function loadScript(){

            // External Button Events
            $(".completed").on("click", function() {

                var id  = $(this).attr("name");

                transferCompleted({{$plan->hash}}, id);
                return true;
            });


            // External Button Events
            $(".later").on("click", function() {

                var id  = $(this).attr("name");
                transferReminder({{$plan->hash}}, id);
                return true;
            });


            function transferReminder(hash, id) {


                $.ajax({
                    type: 'GET',
                    url: '{{env("MYHTTP")}}/{{$blade["locale"]}}/payment-plan/bank-reminder/'+hash+'?val='+id,
                    data: { hash: hash },
                    dataType: 'json',
                    success: function(data) {

                        if(data.success == true){
                            $('#bank-transfer').modal('hide');
                            $('.reminder-alert').removeClass('d-none');

                        }else{
                            alert("Fehler");
                        }
                    }
                })
            }



            function transferCompleted(hash, id) {



                $.ajax({
                    type: 'GET',
                    url: '{{env("MYHTTP")}}/{{$blade["locale"]}}/payment-plan/bank-completed/'+hash+'?val='+id,
                    data: { hash: hash },
                    dataType: 'json',
                    success: function(data) {

                        if(data.success == true){



                            window.location.href = window.location.href + "?bank="+data.msg;

                        }else{
                            alert("Fehler");
                        }
                    }
                })
            }

        }






    </script>

@endsection

