<div class="row">
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
        <span id="uploaded_image">
            @if(isset($company->logo))
                <img src="/uploads/companies/logo/{{$company->logo or ''}}" class="img-thumbnail" width="300">
                <a style="color: #1b1e21" href="#" id="delete-image"><i class="fas fa-minus-circle"></i> delete</a>
            @endif
        </span>
    </div>
</div>
