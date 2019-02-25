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
            border-bottom: 1px solid #28a745
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
            border-left: 6px solid #28a745;
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
            color: #28a745;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #28a745;
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #28a745;
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
            border-top: 1px solid #28a745;
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

<div class="row" id="invoice">
<!--
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>-->
    <div class="col col-lg-8 invoice overflow-auto">
            <header>
                <div class="row">
                    <div class="col">
                         <img src="{{ asset('uploads/companies/logo/'.$company->logo)}}" data-holder-rendered="true" style="width: 200px;" />
                    </div>
                    <div class="col company-details">
                        <h3 class="name">
                                {{$company->name}}
                        </h3>
                        <div>  {{$company->address}}, {{$company->city}} </div>
                        <div>  {{$user->email}}</div>
                        <div> {{$user->phone}}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Plan for:</div>
                        <h2 class="to">{{$plan->firstname}} {{$plan->lastname}}</h2>
                        <div class="address">{{$plan->address1}} {{$plan->address2}} {{$plan->city}}</div>
                        <div class="email">{{$plan->mail}}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Payment Plan</h1>
                        <div class="date">Date of Invoice: {{ \Carbon\Carbon::parse($plan->date)->format('d/m/Y')}} </div>
                        <div class="date">Due Date: {{ \Carbon\Carbon::parse($plan->due_date)->format('d/m/Y')}}</div>
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
                            {{$milestone->name}}
                            @if(isset($milestone->desc) && $milestone->desc!="") -  {{$milestone->desc}} @endif
                        </td>

                        <td class="qty"> {{$milestone->due_at}}</td>
                        <td class="qty"> {{ number_format($milestone->amount, 2) }} €</td>
                        <td style="text-align: right;">

                            <form action="/payment-plan/pay-by-card/{{$plan->hash}}" id="paymentform">
                                <div class="input-group">
                                <select class="form-control" name="paymenttyp" id="paymenttyp">
                                    <option>Select Payment Typ</option>
                                    <option value="2">Bank Transfer (free)</option>
                                    <option value="1">Credit Card (+2%)</option>
                                </select>
                                    <span class="input-group-btn" style="padding-left: 5px;">
                                        <button class="btn btn-success">Pay now</button>
                                    </span>
                                </div>
                            </form>

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
</div>


@endsection

@section('js')
    <script>

    //loads projects for selected client
    $("#paymenttyp").on('change', function() {

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

    </script>

@endsection

