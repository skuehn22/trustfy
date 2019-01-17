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
                <h1>Edit a Clients</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/{{$blade["ll"]}}/freelancer/clients/save/{{$client->id}}">
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label" for="firstname">Firstname</label>
                        <input type="text" class="form-control col-md-10" id="firstname" name="firstname" value="{{$client->firstname}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="lastname">Lastname</label>
                        <input type="text" class="form-control col-md-10" id="lastname" name="lastname" value="{{$client->lastname}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="mail">Email address</label>
                        <input type="email" class="form-control col-md-10" id="mail" name="mail" aria-describedby="emailHelp" value="{{$client->mail}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="address">Address</label>
                        <input type="text" class="form-control col-md-10" id="address" name="address" value="{{$client->address}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="city">City</label>
                        <input type="text" class="form-control col-md-10" id="city" name="city" value="{{$client->city}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="country">Country</label>
                        <input type="text" class="form-control col-md-10" id="country" name="country" value="{{$client->country}}">
                    </div>
                    <button type="submit" class="btn btn-default float-right text-right">Save Client</button>
                </form>
            </div>
        </div>

    </div>
@stop
@section("js")

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop