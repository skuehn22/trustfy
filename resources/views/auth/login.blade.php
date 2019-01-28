@extends('frontend.masters.sign')

@section('seo')
<title>Trustfy Login</title>
@endsection

@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/login-review') }}">
    {{ csrf_field() }}

    <div class="col-md-12 pb-3">
        <h1 class="text-left">Sign in</h1>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-12 control-label text-left font-weight-bold">E-Mail Address</label>
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
        <label for="password" class="col-md-12 control-label text-left font-weight-bold">Password</label>

        <div class="col-md-12">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group sign-up">
        <div class="col-md-12 pb-3">
            <button type="submit" class="btn btn-secondary btn-sign">
                Login
            </button>

            <a class="forget" href="{{ url('en/password/reset') }}">Forgot Your Password?</a>
        </div>
    </div>
    <!--
    <div class="form-group">
        <div class="col-md-12 register pt-5">
            <span>New to Trustfy?</span>
            <a class="btn btn-secondary btn-register" href="/register" role="button">Create an ccount</a>
        </div>
    </div>
    -->
</form>



 <!--
<form class="form-horizontal" role="form" method="POST" action="{{ url('/sign-up') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-8">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-secondary">
                Sign Up
            </button>
            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <a id="login">Already have an account? Log in</a>
        </div>
    </div>
</form>
-->

@endsection
