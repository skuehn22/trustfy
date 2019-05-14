<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Trusty Payment Plans</title>
    <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */

        /*All the styling goes here*/

        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
        }
        body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 18px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
        table td {
            font-family: sans-serif;
            font-size: 16px;
            vertical-align: top;
        }
        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
        .body {
            background-color: #f6f6f6;
            width: 100%;
        }
        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px;
        }
        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px;
        }
        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%;
        }
        .wrapper {
            box-sizing: border-box;
            padding: 20px;
        }
        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }
        .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%;
        }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #999999;
            font-size: 12px;
            text-align: center;
        }
        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px;
        }
        h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize;
        }
        p,
        ul,
        ol {
            font-family: sans-serif;
            font-size: 16px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px;
        }
        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px;
        }
        a {
            color: #1d3e66;
            text-decoration: underline;
        }
        /* -------------------------------------
            BUTTONS
        ------------------------------------- */
        .btn {
            box-sizing: border-box;
            width: 100%; }
        .btn > tbody > tr > td {
            padding-bottom: 15px; }
        .btn table {
            width: auto;
        }
        .btn table td {
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
        }
        .btn a {
            background-color: #ffffff;
            border: solid 1px @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            border-radius: 5px;
            box-sizing: border-box;
            color: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            margin: 0;
            padding: 12px 25px;
            text-decoration: none;
            text-transform: capitalize;
        }
        .btn-primary table td {
            background-color: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
        }
        .btn-primary a {
            background-color: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            border-color: @if(isset($company->color) ) {{ $company->color }} @else #28a745 @endif;
            color: #ffffff;
        }
        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .last {
            margin-bottom: 0;
        }
        .first {
            margin-top: 0;
        }
        .align-center {
            text-align: center;
        }
        .align-right {
            text-align: right;
        }
        .align-left {
            text-align: left;
        }
        .clear {
            clear: both;
        }
        .mt0 {
            margin-top: 0;
        }
        .mb0 {
            margin-bottom: 0;
        }
        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
        }
        .powered-by a {
            text-decoration: none;
        }
        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0;
        }

        .header-text{
            font-size: 20px;
        }


        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important;
            }
            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important;
            }
            table[class=body] .content {
                padding: 0 !important;
            }
            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
            }
            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }
            table[class=body] .btn table {
                width: 100% !important;
            }
            table[class=body] .btn a {
                width: 100% !important;
            }
            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
        }
        /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%;
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }
            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
            .btn-primary table td:hover {
                background-color: #34495e !important;
            }
            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
        }
    </style>
</head>

<body style=" background-color: #f6f6f6; font-family: sans-serif;-webkit-font-smoothing: antialiased;font-size: 14px;line-height: 1.4; margin: 0;padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;width: 100%;">

<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style=" border-collapse: separate;  mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
    <tr>
        <td>&nbsp;</td>
        <td class="container" style="display: block; margin: 0 auto !important;  /* makes it centered */max-width: 580px; padding: 10px;width: 580px;">

            <div class="content" style="box-sizing: border-box; display: block;margin: 0 auto;max-width: 580px;padding: 10px;">
                <!-- START CENTERED WHITE CONTAINER -->

                <div class="footer" style="text-align: center;">

                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-block">
                                <br><br>
                                <p><img src="https://www.trustfy.io/img/trustfy-green.png" data-holder-rendered="true" style="width: 200px;" /></p>
                                <br><br>
                                <span>Hi {{$client->firstname}} {{$client->lastname}},</span><br>
                                <span>{{$user->email}} has created a payment plan for you. </span>
                                <p>You can review the terms and make a payment below.</p>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               Project Title: {{$plan->name}}<br><br>

                               Item: {{$milestones->name}}<br>
                               Price: {{$milestones->amount}}<br>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <br><br><br><br>
                                    <a href="{{ asset('/'.$lang.'/payment-plan/'.$plan->hash) }}" style="background-color: #19A3B8; text-decoration: none; border-color: #19A3B8; padding: 10px; color:#fff; font-size: 12px; border-radius: .25rem; transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out" class="btn btn-primary" target="_blank">View & Pay</a>
                                </p>

                            </td>
                        </tr>
                    </table>
                    <br><br><br>

                    <div class="text-left">
                        <p>
                        <strong>About Escrow.com</strong><br>
                        Escrow.com is the world’s most secure payments method from a counterparty risk perspective- safeguarding both buyer and seller as all funds transacted using escrow are kept in trust. As a winner of multiple awards such as the BBB Torch Award for Ethics, Escrow.com helps you to buy and sell anything safely without the risk of fraud or chargebacks.
                        </p>
                        <p>
                            <strong>How it works</strong><br>
                        Escrow.com provides an escrow service that protects both the buyer and the seller in a transaction. Transactions take place in the following order:
                        </p>
                        <p>
                        The buyer deposits funds into Escrow.com’s trust account<br>
                        Escrow.com notifies the seller that the funds are secured, the seller can now safely provide the goods or service to the buyer<br>
                        The buyer is satisfied with the goods or service and instructs Escrow.com to release the funds to the seller
                        </p>
                        <p>
                        If the buyer or seller are not 100% satisfied with the transaction it will go into arbitration with a neutral 3rd party arbitrator. Escrow.com will disburse the funds according to the arbitrators decision.
                        </p>
                        <p>
                        Sincerely,<br>
                        Escrow.com
                        </p>
                    </div>


                </div>
                <!-- END CENTERED WHITE CONTAINER -->

                <!-- START FOOTER -->
                <div class="footer" style="text-align: center;">
                    <hr>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-block">
                                <span class="apple-link" style="color: #1b1e21">Powered by Trustfy</span>
                                <br>
                                <span  style="color: #1b1e21">The secure escrow payment system for freelancers and their clients. </span>
                                <br>
                                <a style="color:#19A3B8; text-decoration: none;" href="https://www.trustfy.io">Get started</a>.
                            </td>
                        </tr>
                        <tr>
                            <td class="content-block powered-by">
                                <span  style="color: #1b1e21"> © <a href="https://www.trustfy.io" style="color:#19A3B8; text-decoration: none;">trustfy.io</a> 2019. All Rights Reserved.</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
</body>
</html>