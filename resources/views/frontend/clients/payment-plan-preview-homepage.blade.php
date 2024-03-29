@extends('frontend.masters.master-trustfy-new')
@section('seo')
    <title>{!! trans('seo.title_about') !!}</title>
    <meta name="description" content="{!! trans('seo.desc_about') !!}">
    <meta name="keywords" content="{!! trans('seo.keywords_about') !!}">

@endsection
@section('css')

    <style>

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid @if(isset($company->color) ) {{ $company->color }} @else #19A3B8 @endif;
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid @if(isset($company->color) ) {{ $company->color }} @else #19A3B8 @endif;
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: @if(isset($company->color) ) {{ $company->color }} @else #19A3B8 @endif;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: @if(isset($company->color) ) {{ $company->color }} @else #19A3B8 @endif;
            width: 25px;
        }

        .invoice table .total {
            background:@if(isset($company->color) ) {{ $company->color }} @else #19A3B8 @endif;
            color: #fff
        }

        .invoice table tfoot tr:last-child td {
            color: #19A3B8;
            font-size: 1.4em;
            border-top: 1px solid @if(isset($company->color) ) {{ $company->color }} @else #19A3B8 @endif;
        }

        .name{
            padding-right: 0px;
        }

        .cd-main-content .content-wrapper h1 {
            padding: 2em 0 0;
            font-size: 3.2rem;
            font-weight: 300;
        }

        .action-btn-paymentplan {
            width: 100px;
            font-size: 12px;
        }

        .btn-success{
            color: #fff;
            background-color: #19A3B8;
            border-color: #19A3B8;
            width: 100px;
            font-size: 12px;
            height: 30px;
        }

    </style>


@endsection

@section('content')

    <div class="tooltip_templates">
        <span id="tooltip_content">
            <strong>Want to personalize your plan?<br>Creat an account to add your logo, <br>color and business information! <br><a href="/free-register" style="color:#19A3B8;" target="_blank">Create a Free Account</a></strong>
        </span>
    </div>

    <div class="row" id="invoice" style="padding-bottom: 30px;">
        <div class="col col-lg-11 text-right pb-2">
            <a class="btn btn-secondary btn-sign" style="background-color: #fdcc52;" href="/edit-plan?hash={{$plan->hash}}">Edit</a>
            <a class="btn btn-secondary btn-sign" style="background-color: #19A3B8;"  href="/send-plan?hash={{$plan->hash}}">Send</a>
        </div>


        <div class="col col-lg-11 invoice">
            <header>
                @if(isset($protect) && $protect == true)
                    <div class="alert alert-success success_message">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        Thank you. The Payment Plan Protection is now active.
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <img src="https://www.trustfy.io/img/trustfy-green.png" id="logo" data-holder-rendered="true"  data-tooltip-content="#tooltip_content" class="tooltip1 hover" title="Another tooltip" style="width: 200px;" />

                    </div>
                    <div class="col company-details">
                        <h3 class="name">
                            {!! $company->name or '<i>please fill in</i>' !!}<br>
                            @if(isset($user) && $user->tmp_mail==0 && $user->active==1)
                                {{$user->email or ''}}
                            @else
                                {{$user->tmp_mail or ''}}
                            @endif

                        </h3>

                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        @if(isset($plan->lastname) && $plan->lastname!=" ")
                            <h5 class="to">{{$plan->firstname}} {{$plan->lastname}}</h5>
                            <div class="address">{{$plan->address1}} <br>
                                @if(strlen($plan->address2)>1){{$plan->address2 or ''}}<br> @endif
                                {{$plan->city}}</div>
                            <div class="email">{{$plan->email}}</div>
                        @else
                            <!--<i>please fill in</i>-->
                        @endif
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id" style="text-align: right;">Payment Plan</h1>
                        <div class="date">Invoice Date: {{ \Carbon\Carbon::parse($plan->date)->format('d/m/Y')}}  </div>
                        @if($plan->reference != null) <div class="date">Reference: {{ $plan->reference }} </div> @endif
                    </div>
                </div>

                <div class="col invoice-details">
                    <h1 class="invoice-id"style="text-align: left; padding-top: 25px; padding-bottom: 10px;">{{$plan->name}}</h1>
                </div>
                <table border="0" cellspacing="0" cellpadding="0"  class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-left">DESCRIPTION</th>
                        <th class="text-right">DUE ON</th>
                        <th class="text-right">TOTAL</th>
                        <th class="text-right">PAYMENT STATUS</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($milestones as $milestone)


                        <tr>
                            <td class="no">0{{ $milestone->order }}</td>
                            <td class="text-left" style="width:30%;">
                                <strong>{!!  $milestone->name or '<i>please fill in</i>'!!}</strong>
                                <input type="hidden" value="{{$milestone->name}}" id="name_{{$milestone->id}}">
                                @if(isset($milestone->desc) && $milestone->desc!="") -  {{$milestone->desc}} @endif
                            </td>

                            <td class="qty">@if(isset($milestone->due_at)) {{ \Carbon\Carbon::parse($milestone->due_at)->format('d/m/Y')}}  @else  <i>please fill in</i> @endif </td>
                            <td class="qty"  style="width:16%;"> @if(isset($milestone->amount)){{$milestone->currency}} {{ number_format($milestone->amount, 2, '.', ',') }} @else  <i>please fill in</i> @endif</td>
                            <td>

                                @if(isset($milestone->bank_transfer))
                                    @if(isset($milestone->paystatus) && $milestone->paystatus==0)
                                        <form action="/payment-plan/pay-by-bank/{{$plan->hash}}" id="paymentform">
                                            <div class="row">
                                                <div class="col-md-7">

                                                    @if($milestone->credit_card == 1 && $milestone->bank_transfer == 0)
                                                        <div class="radio" style="padding-top: 10px;">
                                                            <label><input type="radio" name="paymenttyp" value="1" checked> Credit Card</label>
                                                        </div>
                                                    @elseif($milestone->credit_card == 1 && $milestone->bank_transfer == 1)

                                                        <div class="radio">
                                                            <label><input type="radio" name="paymenttyp" value="2" checked> Bank Transfer</label>
                                                        </div>

                                                        <div class="radio">
                                                            <label><input type="radio" name="paymenttyp" value="1" > Credit Card</label>
                                                        </div>

                                                    @else
                                                        <div class="radio" style="padding-top: 10px;">
                                                            <label><input type="radio" name="paymenttyp" value="2" checked> Bank Transfer</label>
                                                        </div>
                                                    @endif


                                                </div>
                                                <div class="col-md-5"  style="text-align: right; width: 16%">
                                                <span class="input-group-btn" style="padding-left: 5px;">
                                                    <input class="btn btn-success pay-now tooltip2" style="border: 0px; border-color: #19A3B8; cursor: context-menu;" title="Deactivated in Preview" readonly value="Pay now"><br>
                                                </span>
                                                </div>
                                            </div>
                                        </form>
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
                    @endforeach

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
                                    <a target="_blank" href="/uploads/companies/contracts/{{$plan->id}}/{{$doc->filename}}">{{$doc->name}}</a>
                                    <a href="#" data-id="{{$doc->id}}" data-toggle="tooltip" data-placement="top" title="" class="delete-doc" data-original-title="Delete">
                                        <i class="fas fa-trash green"></i>
                                    </a>
                                </p>

                            @endforeach
                        @endif

                    </div>

                @endif

                <div class="thanks">Thank you!</div>
                @if($plan->comment!=null)
                    <div class="notices">
                        <div style="font-size: 16px;">NOTICE:</div>
                        <div class="notice" style="font-size: 16px;">{!! $plan->comment !!}</div>
                    </div>
                @endif



            </main>

            <footer style="    background-color: #eee;">
                Payment Plan was created on a computer and is valid without the signature and seal.
                <p class="more"><a href="https://www.trustfy.io" target="_blank">Learn more about trustfy.io</a></p>
            </footer>

            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>


        </div>

    </div>
    <div class="row text-right">
        <div class="col col-lg-11 float-right text-right">
            <a class="btn btn-secondary btn-sign" style="background-color: #fdcc52;" href="/edit-plan?hash={{$plan->hash}}">Edit</a>
            <a class="btn btn-secondary btn-sign" style="background-color: #19A3B8;"  href="/send-plan?hash={{$plan->hash}}">Send</a>
<br><br><br>
        </div>
    </div>
@endsection
