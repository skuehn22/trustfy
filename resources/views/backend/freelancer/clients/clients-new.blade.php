@extends('backend.masters.freelancer')
@section('seo')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
@stop
@section('css')

    <style>

    </style>
@stop
@section('breadcrumb')
    Dashboard
@stop

@section('content')
    <div class="clients">
        <div class="row section-heading">
            <div class="col-md-6">
                <h1>New Client</h1>
            </div>
        </div>
        <form action="/{{$blade["ll"]}}/freelancer/clients/save/0">
        <div class="row">
            <div class="col-md-6">
                <h5>Contact</h5>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label" for="firstname">Firstname</label>
                    <input type="text" class="form-control col-md-7" id="client-firstname" name="client-firstname" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="lastname">Lastname</label>
                    <input type="text" class="form-control col-md-7" id="client-lastname" name="client-lastname" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="client-mail">Email address</label>
                    <input type="email" class="form-control col-md-7" id="client-mail" name="client-mail" aria-describedby="emailHelp" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="client-phone">Phone</label>
                    <input type="text" class="form-control col-md-7" id="client-phone" name="client-phone" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="client-mobile">Mobile</label>
                    <input type="text" class="form-control col-md-7" id="client-mobile" name="client-mobile" required>
                </div>


            </div>
            <div class="col-md-6">
                <h5>Billing</h5>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label" for="currency">Curreny</label>
                    <select id="currency" name="currency">
                        <option>select</option>
                        <option value="eur">EUR</option>
                        <option value="gbp">GBP</option>
                    </select>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="client-address1">Address 1</label>
                    <input type="text" class="form-control col-md-7" id="client-address1" name="client-address1" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="client-address2">Address 2</label>
                    <input type="text" class="form-control col-md-7" id="client-address2" name="client-address2" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="city">City</label>
                    <input type="text" class="form-control col-md-7" id="client-city" name="client-city" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label" for="country">Country</label>
                    @include('backend.settings.countries', ['default' => $blade['user']->country])
                </div>
            </div>
        </div>
        </form>
    </div>
@stop
@section("js")

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop