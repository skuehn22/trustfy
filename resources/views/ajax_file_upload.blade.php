<div class="col-md-9 p-0">
    <div class="form-row py-2 pt-0 pl-0 ml-0">
        <h5 class="pt-0">Add Informations</h5>
    </div>

    <p style="font-size: 11px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
    <hr>
    <div class="alert" id="message" style="display: none"></div>
    <div class="row">
        <div class="col-md-7" style="background-color: #ddd;">

            <input type="hidden" id="plan" name="plan" value="{{$plan->id}}">
            {{ csrf_field() }}

            <div class="form-row py-2">
                <span style="font-weight: 500;">Upload addional Documents <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Documents will be added to the payment plan"></i></span>
            </div>

            <div class="form-row py-2">
                <label class="col-md-2 col-form-label" for="doc-name">
                    Name <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Name of the document. E.g. Proposal, Quote, Tender..."></i>
                </label>
                <input type="text" class="form-control col-md-5" id="doc-name" name="doc-name" required>
            </div>

            <div class="form-row py-2 pl-0">
                <div class="col-md-2">
                </div>
                <div class="col-md-5 pl-0">
                    <table class="table">
                        <tr>
                            <td class="p-0" width="30">
                                <input type="file" name="select_file" id="select_file" /><br>
                                <span class="logo-hint">*pdf, jpg, png, gif</span>
                            </td>
                            <td class="p-0" width="30%" align="left">
                                <input type="submit" name="upload" id="upload" class="btn btn-secondary" value="Upload">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <div id="uploaded_image" class="d-none">
                <span style="font-weight: 500;">Attached Documents</span>
            </div>
        </div>
    </div>
    <div class="form-row py-2">
        <div class="col-md-12 pt-1 text-right">
            <div class="btn-group sw-btn-group" role="group" >
                <button class="btn btn-secondary prev-btn" id="prev-btn" type="button">Back</button>
                <button class="btn btn-success next-btn" id="next-btn" type="button">Next</button>
            </div>
        </div>
    </div>
</div>



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
                loadScrips();
            }
        }


        xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/docs?typ="+id, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }



</script>