<div class="company p-3">
    <div class="row">
        <div class="col-md-6">
            <h5>Company Details</h5>
            <p>Give details about your company / freelance activity</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <form data-toggle="validator" role="form" id="company-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="firstname">Firstname</label>
                    <input id="firstname" type="text" class="form-control col-md-6" name="firstname" value="{{ $company->firstname or "" }}" placeholder="Your Firstname" required>
                </div>

                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="lastname">Lastname</label>
                    <input id="lastname" type="text" class="form-control col-md-6" name="lastname" value="{{ $company->lastname or "" }}" placeholder="Your Lastname">
                </div>

                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="company">Company</label>
                    <input id="company" type="text" class="form-control col-md-6" name="company" value="{{ $company->name or "" }}" placeholder="Your Company Name">
                </div>

                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="address">Address</label>
                    <input id="address" type="text" class="form-control col-md-6" name="address" value="{{ $company->address or "" }}" placeholder="The company address">
                </div>

                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="city">City</label>
                    <input id="city" type="text" class="form-control col-md-6" name="city" value="{{ $company->city or "" }}" placeholder="Your Company City">
                </div>

                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="country">Country</label>
                    @include('backend.settings.countries', ['default' => $blade['user']->country])
                </div>

                <div class="col-md-12 pl-0 pt-3" style="float: right; text-align: right;">
                    <div class="btn-group navbar-btn" role="group">
                        <button class="btn btn-success next-btn  save-company" id="next-btn" type="submit">Next</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-6">
            Logo Upload
        </div>

    </div>

</div>

@section("js")

@stop