<div class="row alert alert-secondary">
    <div class="col-md-12">
        <p style="padding-top:25px;"><strong>Upload Contract</strong></p>
        <div class="alert" id="message" style="display: none"></div>
        <form method="post" id="upload_form" enctype="multipart/form-data">
            <input type="hidden" id="plan" name="plan" value="{{$plan->id}}">
            {{ csrf_field() }}
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
        <span id="uploaded_image">
            @if(isset($company->logo))
                <img src="/uploads/companies/contracts/{{$company->logo or ''}}" class="img-thumbnail" width="300">
            @endif
        </span>
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
                    $('#uploaded_image').html(data.uploaded_image);
                }
            })
        });

    });
</script><?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 07.02.2019
 * Time: 18:49
 */