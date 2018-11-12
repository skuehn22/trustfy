@extends('frontend.master-trustfy')
@section('seo')
@stop
@section('css')

@stop

@section('content')

    <div class="container">
        <div class="row">
            @if(isset($msg))
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        {{ $msg }}
                    </div>
                </div>
            @endif<div class="col-md-6">

                <form id="ratingForm" method="POST" action="/save-rating-template">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="form-group col-md-12">


                            <h3>Create another rating</h3>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="description">Short Description</label>
                                <textarea class="form-control" rows="4" id="description" name="description" placeholder="Example: Hello, Marc, here's John, your roofer. I repaired your roof last week and I would be happy if you could leave me a short evaluation here." required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="client-mail">E-Mail Client</label>
                            <input type="email" class="form-control" name="client-mail"  id="client-mail" placeholder="marc@client.com">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="freelancer-mail">Your E-Mail</label>
                            <input type="email" class="form-control" id="freelancer-mail" name="freelancer-mail" placeholder="john@doe.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"id="saveReview">Send Review</button>
                                <div id="msg" class="form-group"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">

                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6">
                <div class="col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        <form id="ratingForm" method="POST" action="/save-rating-template">
                            <p>If you would like to be informed in the future how our product will continue, register here for the newsletter:</p>
                            <label for="freelancer-mail">E-Mail</label>
                            <input type="email" class="form-control" id="freelancer-mail" name="freelancer-mail" placeholder="john@doe.com">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section("js")

@stop