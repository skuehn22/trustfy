
<form class="form-horizontal" role="form" method="POST" action="/provider/settings/save-company">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="company" class="col-md-2 control-label">Name</label>
        <div class="col-md-6">
            <input id="company" type="text" class="form-control" name="company" value="{{$provider->name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="company" class="col-md-2 control-label">Adress</label>
        <div class="col-md-6">
            <input id="company" type="text" class="form-control" name="company" value="{{$provider->name}}">
        </div>
    </div>
    <div class="form-group">
        <label for="company" class="col-md-2 control-label">City</label>
        <div class="col-md-6">
            <input id="company" type="text" class="form-control" name="company" value="{{$provider->name}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10" style="float: right;">
            <button type="submit" class="btn btn-orange">
                <i class="fas fa-save"></i> Save Settings
            </button>
        </div>
    </div>
</form>