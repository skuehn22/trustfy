<div class="inner-panel">
    <form class="form-horizontal" role="form" method="POST" action="/freelancer/settings/save-bank">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h4 class="pb-3">Your Bank Details
            <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Please give us your bank details in which we should relase deposits"></i>
        </h4>

        <div class="row">
            <div class="col-md-5">
                <div class="form-inline">
                    <label for="name" class="col-md-3 control-label  pl-0 pb-3">Owner Name</label>
                    <div class="col-md-7 pl-0 pb-3">
                        <input id="name" type="text" class="form-control" name="name" value="{{$bank->name or ''}}">
                    </div>
                </div>
                <div class="form-inline">
                    <label for="iban" class="col-md-3 control-label  pl-0 pb-3">IBAN</label>
                    <div class="col-md-7 pl-0 pb-3">
                        <input id="iban" type="text" class="form-control" name="iban" value="{{$bank->iban or ''}}">
                    </div>
                </div>
                <div class="form-inline">
                    <label for="bic" class="col-md-3 control-label  pl-0 pb-3">BIC</label>
                    <div class="col-md-7 pl-0 pb-3">
                        <input id="bic" type="text" class="form-control" name="bic" value="{{$bank->bic or ''}}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inline">
                    <label for="address1" class="col-md-3 control-label  pl-0 pb-3">Address Line 1</label>
                    <div class="col-md-5 pl-0 pb-3  text-right">
                        <input id="address1" type="text" class="form-control" name="address1" value="{{$bank->address1 or ''}}">
                    </div>
                </div>
                <div class="form-inline">
                    <label for="address2" class="col-md-3 control-label  pl-0 pb-3">Address Line 2</label>
                    <div class="col-md-5 pl-0 pb-3  text-right">
                        <input id="address2" type="text" class="form-control" name="address2" value="{{$bank->address2 or ''}}">
                    </div>
                </div>
                <div class="form-inline">
                    <label for="city" class="col-md-3 control-label  pl-0 pb-3">City</label>
                    <div class="col-md-5 pl-0 pb-3  text-right">
                        <input id="city" type="text" class="form-control" name="city" value="{{$bank->city or ''}}">
                    </div>
                </div>
                <div class="form-inline">
                    <label for="code" class="col-md-3 control-label  pl-0 pb-3">Postal Code</label>
                    <div class="col-md-5 pl-0 pb-3  text-right">
                        <input id="code" type="text" class="form-control" name="code" value="{{$bank->zip or ''}}">
                    </div>
                </div>
                <div class="form-inline">
                    <label for="country" class="col-md-3 control-label  pl-0 pb-3">Country</label>
                    <div class="col-md-5 pb-3  text-right">
                        @include('backend.settings.countries', [ 'id' => 'country_bank', 'class' => 'form-control col-md-12', 'default' => $bank->country])
                        <input type="hidden" id="country_iso" name="country_iso" value="{{$bank->country_iso or ''}}">
                    </div>
                </div>
                <div class="form-inline">
                    <div class="col-md-8 pl-0 text-right">
                        <button type="submit" class="btn btn-classic">
                            <i class="fas fa-save"></i> Save Bank
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>