@extends('frontend.masters.sign')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="padding:20px;">
                    <div class="panel-heading"><h3>Register</h3></div>
                    <p><hr></p>
                    @if(Session::has('error'))
                        <div class="alert alert-danger error_message">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success error_message">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {!!  Session::get('success') !!}
                        </div>
                    @endif
                    <div class="panel-body text-left" >
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/header-register-save') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label">Please enter your email address</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-12 control-label">Please select a password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 register">
                                    <button type="submit" class="btn btn-secondary btn-sign">
                                        <i class="fa fa-btn fa-user"></i> Sign Up
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="terms-login">
                                    By registering you agree to Trustfy's <a href="https://www.trustfy.io/en/terms" >Terms and Conditions</a> and <a href="https://www.trustfy.io/en/privacy" >Privacy Policy</a>
                                </p>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 register pt-5 text-center">
                                    <p style="font-size: 18px; padding-bottom: 0px;">or
                                        <a href="/{{$ll}}/login" style="background: none; color: #19A3B8">log</a> in if you already have an account</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
