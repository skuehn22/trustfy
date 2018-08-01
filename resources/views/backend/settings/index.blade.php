@extends('backend.master')
@section('seo')
@stop
@section('css')

@stop
@section('breadcrumb')
    Settings
@stop
@section('content')

<div class="container settings">
    <div class="row">
        <div class="col-md-4">
            @include('backend.provider.navbar')
        </div>
        <div class="col-md-8">
            <div id="exTab3">
                <ul  class="nav nav-pills">
                    <li class="active"><a  href="#1b" data-toggle="tab">Company</a></li>
                    <li><a href="#2b" data-toggle="tab">Account</a></li>
                    <li><a href="#3b" data-toggle="tab">Payments</a></li>
                </ul>
                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="1b">
                        @include('backend.settings.company')
                    </div>
                    <div class="tab-pane" id="2b">
                        <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
                    </div>
                    <div class="tab-pane" id="3b">
                        <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
                    </div>
                    <div class="tab-pane" id="4b">
                        <h3>We use css to change the background color of the content to be equal to the tab</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section("js")
@stop