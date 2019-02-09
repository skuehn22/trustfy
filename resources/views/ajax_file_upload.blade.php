<div class="row">
    <div class="col-md-10 p-0">
        <h5 class="pt-3 pb-3">Upload Document</h5>
        <p style="font-size: 10px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
        <div class="alert" id="message" style="display: none"></div>
        <form method="post" id="upload_form" enctype="multipart/form-data">
            <input type="hidden" id="plan" name="plan" value="{{$plan->id}}">
            {{ csrf_field() }}
            <div class="form-row py-2">
                <label class="col-md-4 col-form-label" for="country">Name of Document</label>
                <input type="text" class="form-control col-md-7" id="doc-name" name="doc-name" required>
            </div>
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td class="p-0" width="30"><input type="file" name="select_file" id="select_file" /><br><span class="logo-hint">*pdf, jpg, png, gif</span></td>
                        <td class="p-0" width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-secondary" value="Upload"></td>
                    </tr>
                </table>
            </div>
        </form>
        <br />
        <div id="uploaded_image">

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
                    $('#uploaded_image').html('');
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $('.old_image').remove();
                    getDocs(data.uploaded_image);
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

            }
        }


        xmlhttp.open("GET","{{env("MYHTTP")}}/{{$blade["ll"]}}/freelancer/plans/docs?typ="+id, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }



</script>