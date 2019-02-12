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
            </div>
        </div>
        <form action="/{{$blade["ll"]}}/freelancer/clients/edit/{{$client->id}}">
            <div class="row">
                <div class="col-md-6">
                    <h5>New Client</h5>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label" for="firstname">Firstname</label>
                        <input type="text" class="form-control col-md-7" id="client-firstname" name="client-firstname" value="{{$client->firstname or ''}}" required>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label"  for="lastname">Lastname</label>
                        <input type="text" class="form-control col-md-7" id="client-lastname" name="client-lastname"  value="{{$client->lastname or ''}}" required>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label"  for="client-mail">Email address</label>
                        <input type="email" class="form-control col-md-7" id="client-mail" name="client-mail"  value="{{$client->mail or ''}}" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label"  for="client-phone">Phone</label>
                        <input type="text" class="form-control col-md-7" id="client-phone" name="client-phone" value="{{$client->phone or ''}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label"  for="client-mobile">Mobile</label>
                        <input type="text" class="form-control col-md-7" id="client-mobile" name="client-mobile" value="{{$client->mobile or ''}}">
                    </div>


                </div>
                <div class="col-md-6">
                    <h5>Billing</h5>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label" for="currency">Currency</label>
                        <select id="currency" name="currency" class="col-md-7 col-form-label">
                            <option value="eur">EUR</option>
                            <option value="gbp">GBP</option>
                        </select>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label"  for="client-address1">Address 1</label>
                        <input type="text" class="form-control col-md-7" id="client-address1" name="client-address1"  value="{{$client->address1 or ''}}" required>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label"  for="client-address2">Address 2</label>
                        <input type="text" class="form-control col-md-7" id="client-address2" name="client-address2"  value="{{$client->address2 or ''}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label"  for="city">City</label>
                        <input type="text" class="form-control col-md-7" id="client-city" name="client-city"   value="{{$client->city or ''}}" required>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-4 col-form-label" for="country">Country</label>
                        @include('backend.settings.countries', ['default' => $blade['user']->country])
                    </div>
                    <div class="form-row pt-3 py-2">
                        <button type="submit" class="btn btn-classic">Save Client</button>
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