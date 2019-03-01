<h4 class="pb-3">Verify your account
    <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Please give us your bank details in which we should relase deposits"></i>
</h4>
<div class="row">
    <div class="col-md-4">
        <form data-toggle="validator" role="form" id="company-data" name="company-data" method="POST" action="/freelancer/settings/kyc-check"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12">

                <label class="col-md-12 col-form-label pl-0" for="type">Document Type</label>
                <select name="type" id="type" class="form-control col-md-9">
                    <option value=""></option>


                    @if($company->type == 1)

                        <option value="IDENTITY_PROOF">{{ trans('freelancer_backend.IDENTITY_PROOF') }}</option>
                        <option value="ADDRESS_PROOF">{{ trans('freelancer_backend.ADDRESS_PROOF') }}</option>

                    @else

                        <option value="IDENTITY_PROOF">{{ trans('freelancer_backend.IDENTITY_PROOF') }}</option>
                        <option value="REGISTRATION_PROOF">{{ trans('freelancer_backend.REGISTRATION_PROOF') }}</option>
                        <option value="ARTICLES_OF_ASSOCIATION">{{ trans('freelancer_backend.ARTICLES_OF_ASSOCIATION') }}</option>
                        <option value="SHAREHOLDER_DECLARATION">{{ trans('freelancer_backend.SHAREHOLDER_DECLARATION') }}</option>

                    @endif


                </select>

                <div class="form-group" style="padding-top: 15px;">
                    <input type="file" name="select_file" id="select_file" /><br><span class="logo-hint">*pdf, jpg, png, gif</span>
                </div>

                <p style="font-size: 11px;">
                    Note: Please note that all pages are contained in <br>one document.
                </p>

                <div class="form-group">
                    <div class="col-md-10 float-left text-left pt-5 pl-0">
                        <button type="submit" class="btn btn-classic">
                            <i class="fas fa-save"></i> Send Document
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        @if(count($kyc_doc_objs)>0)
            <label class="col-md-12 col-form-label pl-0" for="type">KYC process</label>
            <table  class="table" style="font-size: 10px;
">
                <thead>
                <tr>
                    <th scope="col">Document Type</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Status</th>
                    <th scope="col">Note</th>
                </tr>
                </thead>

                <tbody>
            @foreach($kyc_doc_objs as $kyc_doc_obj)
                <tr>
                    <td>{{$kyc_doc_obj->doc_type}}</td>
                    <td>{{ \Carbon\Carbon::parse($kyc_doc_obj->created_at)->format('d/m/Y H:i')}}</td>
                    <td>

                        @if($kyc_doc_obj->status == "VALIDATION_ASKED")
                            <i>pending</i>
                        @else
                            {{$kyc_doc_obj->status}}
                        @endif

                    </td>
                    <td>
                        @if($kyc_doc_obj->status == "REFUSED")
                            {{$kyc_doc_obj->refused_reason_type}}
                        @endif
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


