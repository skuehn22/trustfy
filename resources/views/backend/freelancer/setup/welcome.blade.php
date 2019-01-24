@extends('backend.masters.freelancer')
@section('seo')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
@stop
@section('css')

    <style>
        /* CSS used here will be applied after bootstrap.css */

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
    </style>
@stop
@section('breadcrumb')
    Dashboard
@stop

@section('js')

    <script>
    $( document ).ready(function() {

    });


    $(document).on("click", ".save-company", function () {

        data = {};
        obj = {
        "company" : $("#company").val(),
        "address" : $("#address").val(),
        "country" : $("#country").val(),
        "city" : $("#city").val(),
        }

        data["company"] = JSON.stringify(obj);
        save("save-company", data);

    });

    $(document).on("click", ".progress-step1", function () {

        $(".step-1").removeClass( "d-none" )
        $(".step-2").addClass( "d-none" )

    });

    $(document).on("click", ".progress-step2", function () {

        $(".step-2").removeClass( "d-none" )
        $(".step-1").addClass( "d-none" )

    });





    function save(url, data) {

        urlAddress = "{{env('MYHTTP')}}/{{$blade["ll"]}}/freelancer/setup/save/" + url;

            if(data != null && Object.keys(data).length > 0) {

                urlAddress += "?";
                for (var k in data) {
                urlAddress += k + "=" + data[k] + "&";
                }
                urlAddress = urlAddress.slice(0, -1);

            }

            $.ajax({

                type: 'GET',
                url: urlAddress,
                data: { variable: 'value' },
                dataType: 'json',
                success: function(data) {
                    var items = data["project"];
                    $(".step-1").addClass( "d-none" )
                    $(".step-2").removeClass( "d-none" )
            }
        });

    }

    </script>
@stop

@section('content')

    <div class="row section-heading">
        <div class="col-md-6 pl-0">
            <h3>Welcome to trustfy.io</h3>
            <p>first set up your account</p>
        </div>
        <div class="col-md-6 pr-0 float-right text-right">
        </div>
    </div>

    <div class="row setup-steps">
        <div class="col-md-12 step-1">
            @include('backend.freelancer.setup.company')
        </div>
        <div class="col-md-12 step-2 d-none">
            @include('backend.freelancer.setup.clients')
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