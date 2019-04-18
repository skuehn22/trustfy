@extends('frontend.masters.master-trustfy')

@section('seo')
    <title>Trustfy FAQ</title>
    <meta name="description" content="Here you will find the most frequently asked questions">


@section('css')
    <style>
    </style>
@endsection

@section('content')
    <div class="container content-container">
        <br><br>
        <div class="row">
            <div class="col-md-12 content">
                <h1>{!! trans('index.faq') !!}</h1>
                {!! trans('index.faq1') !!}
            </div>
        </div>
    </div>
@endsection
