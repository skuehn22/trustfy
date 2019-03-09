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
    <div class="clients" style="padding:35px;">
        <div class="row section-heading">
            <div class="col-md-6">
            </div>
        </div>
        <form action="/{{$blade["ll"]}}/freelancer/clients/save/0">
        <div class="row">
            <div class="col-md-6">
                <h5 class="pb-3">New Client</h5>
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
                    <input type="text" class="form-control col-md-7" id="client-phone" name="client-phone">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="client-mobile">Mobile</label>
                    <input type="text" class="form-control col-md-7" id="client-mobile" name="client-mobile">
                </div>


            </div>
            <div class="col-md-6">
                <h5 class="pb-3">Billing</h5>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label" for="currency">Currency</label>
                    <select id="currency" name="currency" class="col-md-7 col-form-label">
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
                    <input type="text" class="form-control col-md-7" id="client-address2" name="client-address2">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label"  for="city">City</label>
                    <input type="text" class="form-control col-md-7" id="client-city" name="client-city" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-4 col-form-label" for="country">Country</label>
                    @include('backend.settings.countries', [ 'id' => 'country', 'class' => 'form-control col-md-7', 'default' => $blade['user']->country])
                </div>
                <div class="form-row pt-3 py-2 pt-2">
                    <button type="submit" class="btn btn-classic">Save Client</button>
                </div>

            </div>
        </div>
        </form>
    </div>
@stop
@section("javascript")

    <script>

        $( document ).ready(function() {

            if($("#tour").length && $("#tour").val() == "true"){
                $(".cd-app-screen").addClass('cd-app-screen-step2').removeClass('cd-app-screen');
                $(".cd-nugget-info").addClass('cd-nugget-info-step2').removeClass('cd-nugget-info');
                $("#cd-tour-trigger-step2").removeClass('d-none');
                $("#cd-tour-trigger").addClass('d-none');
            }

        });

    </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop