@extends('backend.masters.freelancer')
@section('seo')

@stop
@section('css')

    <style>

        body{ margin-top:50px;}

        .nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
        .tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
        .tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
        .tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
        .tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
        .tab-pane .list-group .glyphicon { margin-right:5px; }
        .tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
        a.list-group-item.read { color: #222;background-color: #F3F3F3; }
        hr { margin-top: 5px;margin-bottom: 10px; }
        .nav-pills>li>a {padding: 5px 10px;}

        .ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 80%;border: 1px solid #E5E5E5; }
        .ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 110%;}
        .ad a.url {color: #093;text-decoration: none;}

        @keyframes open-plans-left{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate({{$openLeft}}deg);
                transform: rotate({{$openLeft}}deg);
            }
        }

        @keyframes open-plans-right{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate({{$openRight}}deg);
                transform: rotate({{$openRight}}deg);
            }
        }


        @keyframes loading-2{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(10deg);
                transform: rotate(10deg);
            }
        }
        @keyframes loading-3{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(90deg);
                transform: rotate(90deg);
            }
        }
        @keyframes loading-4{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(36deg);
                transform: rotate(36deg);
            }
        }
        @keyframes loading-5{
            0%{
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100%{
                -webkit-transform: rotate(126deg);
                transform: rotate(126deg);
            }
        }
    </style>

@stop

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                    <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                    <div class="progress-value">20%</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                    <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                    <div class="progress-value">75%</div>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6 col-md-12">
                    @include('backend.freelancer.inbox.index')
                </div>
            </div>
        </div>
    </div>

    <!--
    <div class="container dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="far fa-envelope"></i> Inbox
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-12">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-md-12">
                               <a class="btn btn-primary" href="/freelancer/plan/create">Create Payment Plan</a>
                            </div>
                        </div>

                    </div>
                </div>

                -->

               <!--
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="far fa-chart-bar"></i> Bookmarked</h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
                -->
    <!--
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fas fa-magic"></i> Quick Shortcuts
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn modal-btn" id="contract-types" role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Document</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn disabled" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">View Project</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn disabled" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">View Project</p>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/mangopay/sandbox" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Mangopay Sandbox</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn modal-btn" id="clients" role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-address-book"></i> <br/><p style="padding-top: 11px;">View Clients</p>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-4 shortcuts-boxes">
                                <a href="/en/provider/settings" class="btn btn-outline-grey btn-lg panel-btn" role="button">
                                    <i class="fas fa-cog"></i> <br/><p style="padding-top: 11px;">Settings</p>
                                </a>
                            </div>
                        </div>
                        <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>
                    </div>

                </div>
                <!--
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fas fa-chart-line"></i> KPIs</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <a href="/en/documents" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
                                <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Bookmarks</a>
                                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
                                <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>   -->

        <!-- Modal -->
        <div class="modal fade" id="setup-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
<!--
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    -->
                    <div class="modal-body" id="modal-body">
                        @include('backend.freelancer.setup.welcome')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <input id="setup" type="hidden" value="{{$setup}}">


@stop
@section("js")

@stop