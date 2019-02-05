<!DOCTYPE html>
<html lang="en">
<head>

@yield('seo')
@include('frontend.masters.elements.meta')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
<link href="{{ asset('css/frontend/homepage.css') }}" rel="stylesheet">

@yield('css')

@include('frontend.masters.elements.tracking')

</head>

<body>
<!-- Navigation -->

<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-4 pt-3 mx-auto text-center">
        <div class="text-center">
            <a class="" href="{{ asset('/') }}">
                <img src="{{ asset('img/trustfy-green.png') }}" width="200px" alt="Trustfy Freelancer Payment">
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-4 pt-3 login-form mx-auto text-center">
        <div class="text-center">
            @yield('content')
        </div>
    </div>
</div>

<!--
<div class="row">
    <div class="col-12 mx-auto pt-3">
        <div class="text-center">
          <hr>
            © 2019, Freelance Flow Ltd
        </div>
    </div>
</div>
-->



</body>
@yield('js')
</html>
