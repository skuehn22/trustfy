<div class="row">
    <form data-toggle="validator" role="form" id="company-data" name="company-data" method="POST" action="/freelancer/settings/save-company">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-10">
        @if(Session::has('error'))
            <div class="alert alert-danger error_message">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ Session::get('error') }}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success success_message">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ Session::get('success') }}
            </div>
        @endif
        </div>
        <div class="col-md-12">
            <div class="form-row py-2">
                <label class="col-md-3 col-form-label" for="firstname">Firstname</label>
                <input id="firstname" type="text" class="form-control col-md-7" name="firstname" value="{{ $company->firstname or "" }}" placeholder="Your Firstname" required>
            </div>

            <div class="form-row py-2">
                <label class="col-md-3 col-form-label" for="lastname">Lastname</label>
                <input id="lastname" type="text" class="form-control col-md-7" name="lastname" value="{{ $company->lastname or "" }}" placeholder="Your Lastname" required>
            </div>

            <div class="form-row py-2">
                <label class="col-md-3 col-form-label" for="company">Company</label>
                <input id="company" type="text" class="form-control col-md-7" name="company" value="{{ $company->name or "" }}" placeholder="Your Company Name" required>
            </div>

            <div class="form-row py-2">
                <label class="col-md-3 col-form-label" for="address">Address</label>
                <input id="address" type="text" class="form-control col-md-7" name="address" value="{{ $company->address or "" }}" placeholder="The company address" required>
            </div>

            <div class="form-row py-2">
                <label class="col-md-3 col-form-label" for="city">City</label>
                <input id="city" type="text" class="form-control col-md-7" name="city" value="{{ $company->city or "" }}" placeholder="Your Company City" required>
            </div>

            <div class="form-row py-2">
                <label class="col-md-3 col-form-label" for="country">Country</label>
                @include('backend.settings.countries', ['default' => $blade['user']->country])
            </div>
            <div class="form-group">
                <div class="col-md-10 float-left text-left pt-5 pl-0">
                    <button type="submit" class="btn btn-classic">
                        <i class="fas fa-save"></i> Save Settings
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="col-md-6">
        @include('ajax_upload')
    </div>
</div>


