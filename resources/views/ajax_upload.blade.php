<div class="row alert alert-secondary">
    <div class="col-md-12">

                <p style="padding-top:25px;"><strong>Logo Upload</strong></p>
                <div class="alert" id="message" style="display: none"></div>
                <form method="post" id="upload_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <table class="table">
                            <tr>
                                <td class="p-0" width="30"><input type="file" name="select_file" id="select_file" /><br><span class="logo-hint">*jpg, png, gif</span></td>
                                <td class="p-0" width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-secondary" value="Upload"></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br />
                <span id="uploaded_image"></span>
        </div>

</div>

<script>
    $(document).ready(function(){

        $('#upload_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('ajaxupload.action') }}",
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
                    $('#uploaded_image').html(data.uploaded_image);
                }
            })
        });

    });
</script>