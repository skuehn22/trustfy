@extends('frontend.masters.sign')

@section('seo')
    <title>trustfy.io - Error</title>
@stop


@section('content')
    <div class="col-md-12" style="padding-top:25px; padding-bottom:25px;">

        <p>Oops! Looks like some wires got crossed!</p>
        <p>Our tech team has been notified and will get this cleared up shortly.</p>
        <p><a style="text-decoration: underline;" href="{{ URL::previous() }}">back</a></p>

    </div>
@stop


@section("js")

    <script>

    </script>

@stop