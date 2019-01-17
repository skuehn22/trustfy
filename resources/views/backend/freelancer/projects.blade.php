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

@if(Session::has('success'))
        <div class="alert alert-success error_message">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="row section-heading">
        <div class="col-md-6 pl-0">
            <h1>Projects</h1>
        </div>
        <div class="col-md-6 pr-0 float-right text-right">
            <a href="/{{$blade["ll"]}}/freelancer/clients/new" class="btn btn-default btn-lg active" role="button" aria-pressed="true">Add Project</a>
        </div>
    </div>

    @if(count($clients)>0)
        <div class="row table-heading">
            <div class="col-md-2 pl-0"><h5>Lastname</h5></div>
            <div class="col-md-2"><h5>Firstname</h5></div>
            <div class="col-md-2"><h5>Address</h5></div>
            <div class="col-md-2"><h5>City</h5></div>
            <div class="col-md-2"><h5>E-Mail</h5></div>
            <div class="col-md-2 pr-0 float-right text-right">
                <h5>Actions</h5>
            </div>
        </div>

        @foreach($clients as $client)
            <div class="row">
                <div class="col-md-2 pl-0">{{$client->lastname}}</div>
                <div class="col-md-2">{{$client->firstname}}</div>
                <div class="col-md-2">{{$client->address}}</div>
                <div class="col-md-2">{{$client->city}}</div>
                <div class="col-md-2">{{$client->mail}}</div>
                <div class="col-md-2 pr-0 float-right text-right">
                    <a href="/{{$blade["ll"]}}/freelancer/clients/edit/{{$client->id}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit green"></i></a>
                    <a href="#" data-id="{{$client->id}}" data-toggle="modal" data-target="#exampleModal"  title="Delete" class="delete-client">
                        <i class="fas fa-trash green"></i>
                    </a>
                </div>
            </div>
        @endforeach
    @else

        You have no projects yet...

    @endif
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <form action="/{{$blade["ll"]}}/freelancer/clients/delete/" id="deleteform" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
@section("js")

    <script>

        $(document).on("click", ".delete-client", function () {
            var myBookId = $(this).data('id');
            var url = "/en/freelancer/clients/delete/"+myBookId;
            $('#deleteform').attr('action', url);
        });


        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('#modal-from-dom').on('show', function() {
            var id = $(this).data('id'),
                removeBtn = $(this).find('.danger');

            removeBtn.attr('href', removeBtn.attr('href').replace(/(&|\?)ref=\d*/, '$1ref=' + id));

            $('#debug-url').html('Delete URL: <strong>' + removeBtn.attr('href') + '</strong>');
        });

        $('.confirm-delete').on('click', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#modal-from-dom').data('id', id).modal('show');
        });
    </script>
@stop