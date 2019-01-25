@extends('backend.masters.freelancer')
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

    <div class="row">
        <div class="col-md-12 pl-0 pt-0 pr-0">
            <div class="alert alert-success error_message alert-welcome">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <h3>Welcome to trustfy.io</h3>
                <p>First set up your basic account.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pl-0 pt-0 pr-0 border-content">

            <!-- SmartWizard html -->
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Step 1<br /><small>Your company details</small></a></li>
                    <li><a href="#step-2">Step 2<br /><small>Your client details</small></a></li>
                    <li><a href="#step-3">Step 3<br /><small>Create a project</small></a></li>
                    <li><a href="#step-4">Step 4<br /><small>Your bank details</small></a></li>
                </ul>

                <div class="">
                    <div id="step-1" class="">
                        @include('backend.freelancer.setup.company')
                    </div>
                    <div id="step-2" class="">
                        @include('backend.freelancer.setup.clients')
                    </div>
                    <div id="step-3" class="">
                        @include('backend.freelancer.setup.projects')
                    </div>
                    <div id="step-4" class="">
                        @include('backend.freelancer.setup.clients')
                    </div>
                </div>
            </div>


        </div>

    </div>

    <!--
    <form class="form-inline">
        <label>External Buttons:</label>
        <div class="btn-group navbar-btn" role="group">
            <button class="btn btn-success" id="prev-btn" type="button">Back</button>
            <button class="btn btn-success" id="next-btn" type="button">Next</button>
            <button class="btn btn-primary" id="reset-btn" type="button">Reset</button>
        </div>
    </form>


    <br /><br /><br />
-->

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


            urlAddress = "{{env("MYHTTP")}}/{{$blade['ll']}}/provider/" + url;


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
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade['ll']}}/provider/"+ $url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }

    </script>
@stop