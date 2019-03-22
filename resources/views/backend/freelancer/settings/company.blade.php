@if($user->logins_sum < 4)
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Why do we need this information?</strong> This isn’t about collecting your data! There’s a lot of bad people out there (think traffickers and terrorists) trying to launder money through legitimate businesses, and we’re dedicated to preventing that. By properly verifying our users, we’re staying compliant with national and EU regulation and doing our part to stop them.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
<div class="row">

    <div class="col-md-6">
        <form role="form" id="company-data" name="company-data" method="POST" action="/freelancer/settings/save-company">
        <h4>Your Company Details</h4>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12 pl-0">

                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="company">
                        Company
                        <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="If you're a sole trader, just enter your name."></i>
                    </label>
                    <input id="company" type="text" class="form-control col-md-7" name="company" value="{{ $company->name or "" }}" required>
                </div>


                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="companytype">
                        Type
                    </label>

                    @if(isset($company->type))
                        {!! Form::select('companyType', $companyTypes, $company->type, ['class' => 'form-control col-md-7', 'id' => 'companyType','placeholder' => 'Select', 'required']) !!}
                    @else
                        {!! Form::select('companyType', $companyTypes, null, ['class' => 'form-control col-md-7', 'id' => 'companyType','placeholder' => 'Select', 'required']) !!}
                    @endif

                </div>

                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="address">Address 1</label>
                    <input id="address1" type="text" class="form-control col-md-7" name="address1" value="{{ $company->address1 or "" }}" required>
                </div>

                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="address2">Address 2</label>
                    <input id="address2" type="text" class="form-control col-md-7" name="address2" value="{{ $company->address2 or "" }}">
                </div>

                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="city">City</label>
                    <input id="city" type="text" class="form-control col-md-4" name="city" value="{{ $company->city or "" }}"  required>
                    <input id="postcode" type="text" class="form-control col-md-3" name="postcode" value="{{ $company->postcode or "" }}" placeholder="Post Code">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="country">Country</label>


                    @if(isset($company->country_residence))
                        {!! Form::select('country', $countries, $company->country_residence, ['id' => 'country', 'required' => 'true', 'class' => 'form-control col-md-7']) !!}
                    @else
                        {!! Form::select('country', $countries, null, ['id' => 'country', 'required' => 'true', 'class' => 'form-control col-md-7']) !!}
                    @endif


                </div>
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="city">Your Color</label>
                    <div id="color-picker-component" class="input-group colorpicker-component col-md-7 p-0">
                        <input type="text" value="{{ $company->color or "#006600" }}" class="form-control  col-md-12" name="color"/><span class="input-group-addon"><i></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 float-left text-left pt-5 pl-0">
                        <button type="submit" class="btn btn-classic">
                            <i class="fas fa-save"></i> Save Settings
                        </button>
                    </div>
                </div>
            </div>

    </div>

    <div class="col-md-6">
        <h4>Legal Representative
            <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="This information is required for a payment out."></i>
        </h4>

        <div class="form-row py-2">
            <label class="col-md-3 col-form-label" for="firstname">
                First name*
                <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Name of company’s legal representative person"></i>
            </label>
            <input id="firstname" type="text" class="form-control col-md-7" name="firstname" value="{{ $company->firstname or "" }}"required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="form-row py-2">
            <label class="col-md-3 col-form-label" for="address">Last name*</label>
            <input id="lastname" type="text" class="form-control col-md-7" name="lastname" value="{{ $company->lastname or "" }}" required>
        </div>

        <div class="form-row py-2">
            <label class="col-md-3 col-form-label" for="birthday">
                Birthday*
                <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Birthday of company’s legal representative person"></i>
            </label>
            <input type="date" name="birthday" min="1000-01-01" max="3000-12-31" class="form-control col-md-7" value="{{  $company->birthday or "" }}" required>
        </div>
        <div class="form-row py-2">
            <label class="col-md-3 col-form-label" for="nationality">Nationality*</label>

            @if(isset($company->country_nationality))
                {!! Form::select('nationality', $countries, $company->country_nationality, ['id' => 'nationality', 'required' => 'true', 'class' => 'form-control col-md-7']) !!}
            @else
                {!! Form::select('nationality', $countries, null, ['id' => 'nationality', 'required' => 'true', 'class' => 'form-control col-md-7']) !!}
            @endif

        </div>
        </form>
        <br><br>
        @include('ajax_upload')
    </div>
</div>

