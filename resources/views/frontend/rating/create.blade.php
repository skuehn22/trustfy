@extends('frontend.master-trustfy')
@section('seo')
@stop
@section('css')

@stop

@section('content')

    <div class="container" style="padding-top:25px; padding-bottom: 25px;">
        <div class="row">
            <div class="col-md-6">


                <form id="ratingForm" method="POST" action="/save-rating-template">
                    <p>

                <div class="col-md-12 rating-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h3>Create a rating</h3>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="client-mail">E-Mail of your Client*</label>
                            <input type="email" class="form-control" name="client-mail"  id="client-mail" placeholder="marc@client.com" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="freelancer-mail">Name of your Client</label>
                            <input type="text" class="form-control" id="name-client" name="name-client" placeholder="Marc">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
                            </div>
                        </div>
                    </div>
                </div>
                    </p>
                    <p>
                <div class="col-md-12 rating-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h3>Tell us something about the project</h3>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" id="project-name" name="project-name" placeholder="Website created" required>
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
                </div>
                    </p>
                <div class="col-md-12 rating-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h3>Secure your account</h3>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="freelancer-mail">Your E-Mail</label>
                            @if(isset($email))
                                <input type="email" class="form-control" id="freelancer-mail" name="freelancer-mail" value="{{$email}}" required>
                            @else
                                <input type="email" class="form-control" id="freelancer-mail" name="freelancer-mail" placeholder="john@doe.com" required>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="client-mail">Password</label>
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                         *With this data you can access your collected reviews
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
                </div>

            </form>
            </div>
            <div class="col-md-6">
                <p>
                <div class="col-sm-12">
                    <div class="alert alert-info" role="alert">
                        <h4>Hi There!</h4>

                        <p>

                            Welcome to the trustfy review system.
                        </p>
                        <p>
                            Just fill out the fields below. By clicking “Send,” the person you’re inviting will receive a message asking them to leave a review. They can award 1 to 5 stars and leave a comment.
                        <p>
                            Your rating will not be published.
                        </p>
                        <p>
                            We are beta testing this service and won’t be publishing any information provided- but please let us know what you think!
                            You will receive your customer's feedback as soon as they fill out the form.
                        </p>
                    </div>
                </div>
            </div>
            </p>
        </div>
    </div>

@stop
@section("js")

@stop