@extends('frontend.masters.master-trustfy')

@section('seo')

    <title>{!! trans('seo.title_escrow') !!}</title>
    <meta name="description" content="{!! trans('seo.desc_escrow') !!}">
    <meta name="keywords" content="{!! trans('seo.keywords_escrow') !!}">

@endsection


@section('css')
    <style>
        h1{
            font-weight: 700;
            color: #676767;
            padding-top:45px;
        }

        h2{
            font-weight: 700;
            color: #676767;
            padding: 25px 25px 25px 0px;
        }

        h3{
            font-weight: 700;
            color: #676767;
            padding: 25px 25px 25px 0px;
        }

        strong{
            color: #676767;
        }

    </style>
@endsection


@section('content')

        <div class="row">
            <div class="col-xs-12 col-md-12 content pt-5">
                <div class="row">
                    <div class="col-xs-12 col-md-10 pt-4">
                        {!! trans('index.escrow_txt') !!}
                    </div>
                </div>
            </div>
        </div>

@endsection
