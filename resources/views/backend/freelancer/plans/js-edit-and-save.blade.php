    <script>

        if($("#tour").length && $("#tour").val() == "true"){
            $(".cd-app-screen").removeClass('d-none').addClass('cd-app-screen-step2').removeClass('cd-app-screen');
            $(".cd-nugget-info").removeClass('d-none').addClass('cd-nugget-info-step2').removeClass('cd-nugget-info');
            $("#cd-tour-trigger-step4").removeClass('d-none');
            $("#cd-tour-trigger").addClass('d-none');
        }


        // External Button Events
        $("#cd-tour-trigger-step4").on("click", function() {

            $(".cd-app-screen-step2").addClass('d-none');
            $(".cd-nugget-info-step2").addClass('d-none');

            var doc = "";

            $.ajax({
                type: 'GET',
                url: '{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/tour/done',
                data: { variable: doc },
                dataType: 'json',

                success: function(data) {



                }
            });


        });


        //initalize the arrow bar on the top of the modal
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'default',
            keyNavigation: false,
            transitionEffect:'slide',
            autoAdjustHeight: false,
            toolbarSettings: {toolbarPosition: 'none',
                toolbarExtraButtons: [
                    {label: 'Finish', css: 'btn-success', onClick: function(){ alert('Finish Clicked'); }},
                    {label: 'Cancel', css: 'btn-warning', onClick: function(){ $('#smartwizard').smartWizard("reset"); }}
                ]
            }
        });

        $('#smartwizard').smartWizard("theme", "default");

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {

            var elmForm = $("#form-step-" + stepNumber);


            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if(stepDirection === 'forward' && elmForm){


                elmForm.validator('validate');

                var elmErr = elmForm.children('.has-error');

                if(elmErr && elmErr.length > 0){

                    return false;
                }



                if(stepNumber == 1 ){


                    var temp = $('#typ').val();
                    if(temp == ""){
                        $('#typ').focus();
                        return false;
                    }

                    var temp = $('#title-milestone').val();
                    if(temp == ""){
                        $('#title-milestone').focus();
                        return false;
                    }

                    var temp = $('#due-date').val();
                    if(temp == ""){
                        $('#due-date').focus();
                        return false;
                    }

                    var temp = $('#single-amount').val();
                    if(temp == ""){
                        $('#single-amount').focus();
                        return false;
                    }

                }

            }
            return true;
        });


        // External Button Events
        $(".next-btn").on("click", function() {
            // Reset wizard
            $('#smartwizard').smartWizard("next");
            return true;
        });

        $(".prev-btn").on("click", function() {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            return true;
        });


        $( document ).ready(function() {

            //activate payment options
            $('#togBtn').click();
            $('#togBtnBt').click();

            loadScript();
            $('.btn-group').removeClass("step-content");

            $("#typ").val( {{$plan->typ}} );

            @if(isset($milestones_edit))
                getPlanTyp({{$plan->id}});
            @endif

            $('.sw-toolbar-top').removeClass("tab-content");



        });

        // External Button Events
        $("#create-client-fly").on("click", function() {
            $('#create-client-modal').modal('show');
        });

        // External Button Events
        $(".close-saved").on("click", function() {
            $('#saved-modal').modal('hide');
        });

        //STEP 4: Toggle Buttons for Payment Options
        @if($plan->credit_card == 1)
        $("#togBtn").click();
        @endif

        @if($plan->bank_transfer == 1)
        $("#togBtnBt").click();
        @endif

        $("#togBtn").on('change', function() {

            if ( $(this).val() == "true") {
                $(this).val('false');
            }
            else {
                $(this).val('true');
            }});

        $("#togBtnBt").on('change', function() {

            if ( $(this).val() == "true") {
                $(this).val('false');
            }
            else {
                $(this).val('true');
            }});

        //topmenu
        $(document).on("click", ".button-menu", function () {

            event.preventDefault();
            $.ajax({
                url:"{{ route('freelancer.plans.save') }}",
                method:"GET",
                data:$('#upload_form').serialize(),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    $('#msg').html(data.message);
                    $('#saved-modal').modal('show');
                }
            })
        });

        $("#preview-btn").on("click", function() {

            event.preventDefault();
            $.ajax({
                url:"{{ route('freelancer.plans.save') }}",
                method:"GET",
                data:$('#upload_form').serialize(),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    var plan = $("#plan").val();
                    mywindow = window.open("/payment-plan/load-preview/"+plan , "mywindow", "location=1,status=1,scrollbars=1,  width=950,height=800");
                }
            })
        });


        $("#send-plan").on("click", function() {

            event.preventDefault();
            $.ajax({
                url:"{{ route('freelancer.plans.save') }}",
                method:"GET",
                data:$('#upload_form').serialize(),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {

                    var plan = $("#plan").val();
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('freelancer.plan.send') }}",
                        method:"GET",
                        data: $('#upload_form').serialize(),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data)
                        {
                            $('#msg-send').html(data.message);
                            $('#send-modal').modal('show');
                        }
                    })
                }
            })

        });


        //initalize datepicker
        $( function() {
            $( "#creation-date" ).datepicker();
        } );


        //loads projects for selected client
        $("#typ").on('change', function() {

            if($("#typ").val() == 1){
                getPlanTyp($(this).val());
            }


        });


        function getDocs(id) {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("uploaded_image").innerHTML = xmlhttp.responseText;
                    $('#uploaded_image').removeClass("d-none");
                    loadScript();
                }
            }


            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/docs?typ="+id, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
        }

        //load scripts after a ajax call
        function loadScript(){

            //adds tolltips
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });


            $("#projects-dropdown").on('change', function() {
                //action('projects/by-client',  $(this).val());
            });

            $( function() {
                $( "#due-date" ).datepicker();
            } );


            $("#pay-due").on('change', function() {

                if($(this).val() == 3){
                    loadScript();
                    $(".due").removeClass( "d-none" )
                    $(".amount").removeClass( "d-none" )
                }else{
                    $(".amount").removeClass( "d-none" )
                }
            });

            $(document).ready(function () {
                var counter = 0;

                $("#addrow").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
                    cols += '<td><input type="text" class="form-control" name="amount' + counter + '"/></td>';
                    cols += '<td><input type="text" class="form-control" id="due_date' + counter + '" name="due_date' + counter + '"/></td>';
                    cols += '<td><textarea class="form-control" rows="3" name="description' + counter + '"></textarea></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                    newRow.append(cols);
                    $("table.order-list").append(newRow);
                    $( "#due_date" + counter).datepicker();
                    counter++;
                });


                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });
            });



            function calculateRow(row) {
                var price = +row.find('input[name^="price"]').val();

            }

            function calculateGrandTotal() {
                var grandTotal = 0;
                $("table.order-list").find('input[name^="price"]').each(function () {
                    grandTotal += +$(this).val();
                });
                $("#grandtotal").text(grandTotal.toFixed(2));
            }

            //initalize datepicker
            $( function() {
                $( "#due_date" ).datepicker();
            } );


            //loads projects for selected client
            $(".delete-doc").on('click', function() {

                var doc = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/delete-doc',
                    data: { variable: doc },
                    dataType: 'json',

                    success: function(data) {

                        $("."+doc).hide();

                    }
                });
            });
        }


    function getPlanTyp(id) {

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.getElementById("plan-typ-response").innerHTML = xmlhttp.responseText;

                @if(isset($milestones_edit->due_typ))
                    $("#pay-due").val({{$milestones_edit->due_typ}});
                    $(".amount").removeClass("d-none");
                    getDocs({{$plan->id}});
                @endif

                loadScript();
            }
        };

        @if(isset($milestones_edit->due_typ))
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/get-plan-typ/?typedit="+id, true);
        @else
            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/get-plan-typ/?typ="+id, true);
        @endif

        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }


    function savePlan() {

        var plan =  $("#plan").val();

        $.ajax({

            type: 'GET',
            url: '{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/save/'+plan,
            data: { variable: 'value' },
            dataType: 'json',
            success: function(data) {

                var items = data["project"];

            }
        })
    }

    function action(url, id) {

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                switch(url) {
                    case 'projects/by-client':
                        document.getElementById("projects").innerHTML = xmlhttp.responseText;
                        loadScript();
                        break;
                    case 'clients/get-by-id':
                        var client = JSON.parse(xmlhttp.responseText);
                        loadScript();
                        break;
                    default:
                    // code block
                }
            }
        };

        xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/"+url+"/?id="+id, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }

</script>


    <script>

        $(document).ready(function(){

            $('#upload_form').on('submit', function(event){

                event.preventDefault();
                $.ajax({
                    url:"{{ route('ajax_file_upload.action') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {

                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        getDocs($("#plan").val());
                    }
                })
            });

        });


        function getDocs(id) {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("uploaded_image").innerHTML = xmlhttp.responseText;
                    $('#uploaded_image').removeClass("d-none");
                    loadScript();
                }
            }


            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/docs?typ="+id, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
        }


        $(".load-preview").on("click", function() {

            event.preventDefault();
            $.ajax({
                url:"<?php echo e(route('freelancer.plans.save')); ?>",
                method:"GET",
                data:$('#upload_form').serialize(),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {

                    loadPreview();

                }
            })


        });


        function loadPreview() {

            var plan =  $("#plan").val();

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    $('.sw-toolbar').addClass("d-none");

                    document.getElementById("preview-container").innerHTML = xmlhttp.responseText;

                }
            }


            xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/preview/"+plan, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
        }

    </script>