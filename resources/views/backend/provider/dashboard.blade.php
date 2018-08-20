@extends('backend.master')
@section('seo')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
@stop
@section('css')

@stop
@section('breadcrumb')
Dashboard
@stop

@section('content')

    <div class="container dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="far fa-envelope"></i> Inbox</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fas fa-magic"></i> Quick Shortcuts</h3>
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
                                <a href="#" class="btn btn-outline-grey btn-lg panel-btn disabled" role="button">
                                    <i class="fas fa-file-alt"></i> <br/><p style="padding-top: 11px;">Create Contract</p>
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
                        <!--<a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>-->
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
        -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        What do you need?
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                    <!--
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    -->
                </div>
            </div>
        </div>

    </div>



@stop
@section("js")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script>

        $( document ).ready(function() {
            loadScrips();
        });

        function loadScrips(){

            //loads content for shortcuts
            $(".modal-btn").click(function() {
                getModalContent($(this).attr('id'));
            });

            //loads content for shortcuts
            $(".load-modul").click(function() {

                url=$(this).attr('id');

                data = {};

                obj = {
                    "client": $( "select#clients option:checked" ).val(),
                    "expiresdate": $("#expires-date").val(),
                    "dateproposal": $("#date-proposal").val()
                };

                data["proposal"] = JSON.stringify(obj);
                action(url, data);

            });

            $( ".date_proposal" ).datepicker({
                required: true,
                minDate: +7,
                numberOfMonths: 1,
                clearText: 'delete', clearStatus: 'delete current date',
                closeText: 'close', closeStatus: 'close without changes',
                prevText: 'back', prevStatus: 'show last month',
                nextText: 'forward', nextStatus: 'show next month',
                currentText: 'today', currentStatus: '',
                monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                monthStatus: 'show other month', yearStatus: 'show other year',
                weekHeader: 'We', weekStatus: 'Week of the month',
                dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                dayNamesShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
                dayNamesMin: ['Su','Mo','Tu','We','Th','Fr','Sa'],
                dayStatus: 'Set DD as first Weekday', dateStatus: 'Choose D, M d',
                dateFormat: 'dd.mm.yy', firstDay: 1,
                initStatus: 'Select a date', isRTL: false,
                onClose: function( selectedDate ) {
                    if(selectedDate!=null && selectedDate!=""){
                        var current_date = $.datepicker.parseDate('dd.mm.yy', selectedDate);
                        current_date.setDate(current_date.getDate()+1);
                        $( ".expires_date" ).datepicker( "show", "option", "minDate", current_date );
                    }
                }
            });

            $( ".expires_date" ).datepicker({
                required: true,
                numberOfMonths: 1,
                clearText: 'delete', clearStatus: 'delete current date',
                closeText: 'close', closeStatus: 'close without changes',
                prevText: 'back', prevStatus: 'show last month',
                nextText: 'forward', nextStatus: 'show next month',
                currentText: 'today', currentStatus: '',
                monthNames: ['January','February','March','April','May','June',
                    'July','August','September','October','November','December'],
                monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun',
                    'Jul','Aug','Sep','Oct','Nov','Dec'],
                monthStatus: 'show other month', yearStatus: 'show other year',
                weekHeader: 'We', weekStatus: 'Week of the month',
                dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                dayNamesShort: ['Su','Mo','Tu','Wed','Thu','Fri','Sat'],
                dayNamesMin: ['Su','Mo','Tu','We','Th','Fr','Sa'],
                dayStatus: 'Set DD as first Weekday', dateStatus: 'Wähle D, M d',
                dateFormat: 'dd.mm.yy', firstDay: 1,
                minDate: 0+1,
                initStatus: 'Select a date', isRTL: false,
                onClose: function( selectedDate ) {
                    if(selectedDate!=null && selectedDate!=""){
                        var current_date = $.datepicker.parseDate('dd.mm.yy', selectedDate);
                        current_date.setDate(current_date.getDate()-1);
                        $( ".expires_date" ).datepicker( "option", "minDate", current_date);
                        $( ".expires_date" ).datepicker( "show");
                    }
                }
            });


        }

        function action(url, data){

            //alert($url);

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("modal-body").innerHTML = xmlhttp.responseText;
                    loadScrips();
                }
            };


            urlAddress = "{{env("MYHTTP")}}/{{$blade['locale']}}/provider/" + url;


            if(data != null && Object.keys(data).length > 0) {

                urlAddress += "?";

                for (var k in data) {
                    urlAddress += k + "=" + data[k] + "&";
                }

                urlAddress = urlAddress.slice(0, -1);

            }

            xmlhttp.open("GET", urlAddress, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }


        function getModalContent($url){

            //alert($url);

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("modal-body").innerHTML = xmlhttp.responseText;
                    loadScrips();
                }
            }
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade['locale']}}/provider/"+ $url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }



    </script>

@stop