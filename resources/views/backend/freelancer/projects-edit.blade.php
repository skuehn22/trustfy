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
                <h1>Edit a Project</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/{{$blade["ll"]}}/freelancer/projects/save/{{$project->id}}">
                    <div class="form-row py-2">
                        <h5>General Informations</h5>
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label" for="clients">Client</label>
                        @if(count($clients)>0)
                            <select name="clients" id="clients" class="col-md-10">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
                                @endforeach
                            </select>
                        @else
                            <div class="pt-2">
                                No clients created yet. <a href="/{{$blade["ll"]}}/freelancer/clients/new">Create Client</a>
                            </div>

                        @endif
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label" for="name">Name</label>
                        <input type="text" class="form-control col-md-10" id="name" name="name" value="{{$project->name}}">
                    </div>
                    <div class="form-row py-2">
                        <label class="col-md-2 col-form-label"  for="description">Description</label>
                        <textarea class="form-control col-md-10" rows="5" id="description" name="description">{{$project->desc}}</textarea>
                    </div>
                    <div class="form-row py-2">
                        <h5>Address optional</h5>
                    </div>

                    @if(!empty($projectaddress->street))
                        <div class="form-row py-2">
                            <label class="col-md-2 col-form-label"  for="address">Street</label>
                            <input type="text" class="form-control col-md-10" id="street" name="street" value="{{$projectaddress->street}}">
                        </div>
                        <div class="form-row py-2">
                            <label class="col-md-2 col-form-label"  for="city">City</label>
                            <input type="text" class="form-control col-md-10" id="city" name="city" value="{{$projectaddress->city}}">
                        </div>
                        <div class="form-row py-2">
                            <label class="col-md-2 col-form-label"  for="country">Country</label>
                            <input type="text" class="form-control col-md-10" id="country" name="country" value="{{$projectaddress->country}}">
                        </div>
                    @else
                        <div class="form-row py-2">
                            <label class="col-md-2 col-form-label"  for="address">Street</label>
                            <input type="text" class="form-control col-md-10" id="street" name="street">
                        </div>
                        <div class="form-row py-2">
                            <label class="col-md-2 col-form-label"  for="city">City</label>
                            <input type="text" class="form-control col-md-10" id="city" name="city">
                        </div>
                        <div class="form-row py-2">
                            <label class="col-md-2 col-form-label"  for="country">Country</label>
                            <input type="text" class="form-control col-md-10" id="country" name="country">
                        </div>
                    @endif

                    <button type="submit" class="btn btn-default float-right text-right">Save Project</button>
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