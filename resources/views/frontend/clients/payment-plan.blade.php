@extends('frontend.masters.paymentplan')

@section('seo')
    <title>Trustfy Login</title>
@endsection


@section('css')

    <style>

        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 50px;
            border: 1px solid #d4d4d4
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0;
            color: #9d9d9d;
        }

        .invoice .contacts {
            margin-bottom: 50px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #9d9d9d;
        }

        .invoice main {
            padding-bottom: 50px;
            padding-top: 30px;
        }

        .invoice main .thanks {
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            width: 25px;
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background:@if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #006600;
            font-size: 1.4em;
            border-top: 1px solid @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .more{
            padding-top: 20px;
        }

        .more a{
            color: #9d9d9d;
            text-decoration: underline;
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        .pay-now{
            font-size: 15px;
        }

        .successful{
            color: green;
            font-weight: 700;
            font-style: italic;
            float: right;
            font-size: 18px;
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }


        }


        .blur {
            -webkit-filter: blur(2px);
            filter: blur(4px);
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
        <div class="col col-lg-8 invoice overflow-auto">
    @endif

            <header>
                @if(isset($protect) && $protect == true)
                    <div class="alert alert-success success_message">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        Thank you. The Payment Plan Protection is now active.
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        @if(isset($company->logo))
                            @if( file_exists(public_path('uploads/companies/logo/'.$company->logo)))
                                <img src="{{ asset('uploads/companies/logo/'.$company->logo)}}" data-holder-rendered="true" style="width: 200px;" />
                            @endif
                        @endif
                    </div>
                    <div class="col company-details">
                        <h3 class="name">
                                {!! $company->name or '<i>please fill in</i>' !!}
                        </h3>
                        <div>  {{$company->address or ''}}, {{$company->city or ''}} </div>
                        <div>  {{$user->email or ''}}</div>
                        <div> {{$user->phone or ''}}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Plan for:</div>
                        @if(isset($plan->lastname) && $plan->lastname!=" ")
                            <h2 class="to">{{$plan->firstname}} {{$plan->lastname}}</h2>
                            <div class="address">{{$plan->address1}} {{$plan->address2}} {{$plan->city}}</div>
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
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-left">DESCRIPTION</th>
                        <th class="text-right">DUE AT</th>
                        <th class="text-right">TOTAL</th>
                        <th class="text-right">PAY POSITION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="no">01</td>
                        <td class="text-left" style="width:40%;">
                            {!!  $milestone->name or '<i>please fill in</i>'!!}
                            <input type="hidden" value="{{$milestone->name}}" id="name_{{$milestone->id}}">
                            @if(isset($milestone->desc) && $milestone->desc!="") -  {{$milestone->desc}} @endif
                        </td>

                        <td class="qty"> {!!  $milestone->due_at or '<i>please fill in</i>' !!}</td>
                        <td class="qty"> @if(isset($milestone->amount)){{ number_format($milestone->amount, 2, '.', ',') }} € @else  <i>please fill in</i> @endif</td>
                        <td>
{{$milestone->paystatus}}
                            @if(isset($milestone->bank_transfer))
                                @if(isset($milestone->paystatus) && $milestone->paystatus==0)
                                    <form action="/payment-plan/pay-by-bank/{{$plan->hash}}" id="paymentform">
                                        <div class="row">
                                            <div class="col-md-7">

                                                @if($milestone->credit_card == 1 && $milestone->bank_transfer == 0)
                                                    <div class="radio" style="padding-top: 10px;">
                                                        <label><input type="radio" name="paymenttyp" value="1" checked> Credit Card (+2%)</label>
                                                    </div>
                                                @elseif($milestone->credit_card == 1 && $milestone->bank_transfer == 1)

                                                    <div class="radio">
                                                        <label><input type="radio" name="paymenttyp" value="2" checked> Bank Transfer (free)</label>
                                                    </div>

                                                    <div class="radio">
                                                        <label><input type="radio" name="paymenttyp" value="1" > Credit Card (+2%)</label>
                                                    </div>

                                                @else
                                                    <div class="radio" style="padding-top: 10px;">
                                                        <label><input type="radio" name="paymenttyp" value="2" checked> Bank Transfer (free)</label>
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="col-md-5"  style="text-align: right;">
                                                <span class="input-group-btn" style="padding-left: 5px;">
                                                    <button class="btn btn-success pay-now">Pay now</button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                @elseif(isset($milestone->paystatus) && $milestone->paystatus==2)
                                        <p class="successful">Money Realsed</p>
                                    @else
                                        <p class="successful">Amount Funded</p>
                                        <span class="input-group-btn" style="padding-left: 5px;">
                                            <button class="btn btn-success work-done" id="{{$milestone->id}}">Work Done</button>
                                        </span>
                                @endif
                            @else
                                <i>please fill in</i>
                            @endif
                        </td>
                    </tr>


                    </tbody>
                    <!--
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>$5,200.00</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">TAX 25%</td>
                        <td>$1,300.00</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">GRAND TOTAL</td>
                        <td>$6,500.00</td>
                    </tr>
                    </tfoot>
                    -->
                </table>

                @if(isset($docs) && count($docs)>0)

                <div class="docs">

                    Please note the following binding documents:

                    @if(isset($docs))
                        @foreach($docs as $doc)

                            <p class="{{$doc->id}}">
                                <a target="_blank" href="/uploads/companies/contracts/{{$doc->filename}}">{{$doc->name}}</a>
                                <a href="#" data-id="{{$doc->id}}" data-toggle="tooltip" data-placement="top" title="" class="delete-doc" data-original-title="Delete">
                                    <i class="fas fa-trash green"></i>
                                </a>
                            </p>

                        @endforeach
                    @endif

                </div>

                @endif

                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">{{$plan->comment}}</div>
                </div>
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
                        <label for="email" class="col-md-12 control-label">Enter a E-Mail Address</label>

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
                        <label for="email" class="col-md-12 control-label">E-Mail Address</label>

                        <div class="col-md-12 pl-0">

                            <input id="email-login" type="email" class="form-control" name="email-login">
                            <input type="hidden" value="{{$hash}}" name="hash" id="hash">

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
                <h3 class="modal-title-msg" id="modal-title-msg">Work done</h3>
            </div>
            <div class="modal-body"  id="modal-body-msg">
                <form class="form-horizontal" id="release-form" role="form" method="POST" action="/payment-plan/release-milestone/{hash}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="milestone" class="col-md-12 control-label">Milestone</label>
                        <div class="col-md-12 pl-0">
                            <input id="milestone-done" type="text" class="form-control" name="milestone-done" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 register  pl-0">
                            <button id="do-release" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-user"></i> Release Money
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



@endsection

@section('js')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>

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




        //loads projects for selected client

        $('input[type=radio][name=paymenttyp]').change(function() {


            if($(this).val() == 1){
                    $('#paymentform').attr('action', '/payment-plan/pay-by-card/{{$plan->hash}}');
            }else{
                if($(this).val() == 2){
                    $('#paymentform').attr('action', '/payment-plan/pay-by-bank/{{$plan->hash}}');
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
             var name =   $('#name_'+$(this).attr("id")).val();

             $('#release-form').attr('action', '/payment-plan/release-milestone/'+id);
             $('#milestone-done').val(name);
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

    </script>

@endsection

