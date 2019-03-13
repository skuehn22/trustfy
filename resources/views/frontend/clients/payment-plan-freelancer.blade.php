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
            border-bottom: 1px solid #fff;
            font-size: 14px;
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 14px
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

        <div class="col col-lg-9 invoice overflow-auto">
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
                        <div>
                            {{$company->address1 or ''}},
                            @if(isset($company->address2) && $company->address2!='') {{$company->address2 or ''}},@endif
                            {{$company->postcode or ''}},
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
                        <td class="text-left" style="width:30%;">
                            {!!  $milestone->name or '<i>please fill in</i>'!!}
                            <input type="hidden" value="{{$milestone->name}}" id="name_{{$milestone->id}}">
                            @if(isset($milestone->desc) && $milestone->desc!="") -  {{$milestone->desc}} @endif
                        </td>

                        <td class="qty"> {!!  $milestone->due_at or '<i>please fill in</i>' !!}</td>
                        <td class="qty"> @if(isset($milestone->amount)){{ number_format($milestone->amount, 2, '.', ',') }} € @else  <i>please fill in</i> @endif</td>
                        <td>

                            @if(isset($milestone->bank_transfer))


                                        <div class="row">
                                            <div class="col-md-7">
                                                @if(isset($milestone->paystatus) && $milestone->paystatus<1)
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
                                                @endif
                                            </div>

                                            <div class="col-md-5"  style="text-align: right;">
                                                <span class="input-group-btn" style="padding-left: 5px;">
                                                    <h4 style="color:{{ $status['color'] }}"><i>{{ $status['state'] }}</i></h4>
                                                </span>
                                            </div>
                                        </div>
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


@endsection

@section('js')



@endsection

