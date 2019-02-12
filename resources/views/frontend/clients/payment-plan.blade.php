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
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #006600
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0;
            color: #006600;
        }

        .invoice .contacts {
            margin-bottom: 20px
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
            color: #006600
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #006600
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
            color: #006600;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #006600
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #006600;
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
            border-top: 1px solid #006600
        }

        .invoice table tfoot tr td:first-child {
            border: none
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

    <!--Author      : @arboshiki-->
<div id="invoice">
<!--
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>-->
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
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
                        <th class="text-right">Pay</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="no">01</td>
                        <td class="text-left">
                            <h3>
                                {{$milestone->name}}
                            </h3>
                            <h3>
                                {{$milestone->desc}}
                            </h3>
                        </td>

                        <td class="qty"> {{$milestone->due_at}}</td>
                        <td class="qty"> {{ number_format($milestone->amount, 2) }} €</td>
                        <td style="text-align: right;"><a href="/payment-plan/pay-by-card/{{$plan->hash}}" class="btn btn-success">Pay Milestone by Card</a></td>
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

                <div style="float: right;">

                </div>

                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">{{$plan->comment}}</div>
                </div>
            </main>
            <footer>
                Payment Plan was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>


@endsection