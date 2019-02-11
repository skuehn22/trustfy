<div class="inner-panel">

    <form class="form-horizontal" role="form" method="POST" action="/freelancer/settings/save-bank">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h4 class="pb-3">Your Bank Details
            <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Please give us your bank details in which we should relase deposits"></i>
        </h4>
        <div class="form-group">
            <label for="name" class="col-md-5 control-label  pl-0">Name</label>
            <div class="col-md-4 pl-0">
                <input id="name" type="text" class="form-control" name="name" value="{{$bank->name or ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="iban" class="col-md-5 control-label  pl-0">IBAN</label>
            <div class="col-md-4 pl-0">
                <input id="iban" type="text" class="form-control" name="iban" value="{{$bank->iban or ''}}">
            </div>
        </div>
        <div class="form-group">
            <label for="bic" class="col-md-5 control-label  pl-0">BIC</label>
            <div class="col-md-4 pl-0">
                <input id="bic" type="text" class="form-control" name="bic" value="{{$bank->bic or ''}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10 pl-0">
                <button type="submit" class="btn btn-classic">
                    <i class="fas fa-save"></i> Save Data
                </button>
            </div>
        </div>
    </form>

</div>