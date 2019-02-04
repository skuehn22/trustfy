
<form class="form-horizontal" role="form" method="POST" action="/freelancer/settings/save-account">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <!--
    <div class="form-group">
        <label for="company" class="col-md-2 control-label">Firstname</label>
        <div class="col-md-6">
            <input id="firstname" type="text" class="form-control" name="firstname" value="{{$user->firstname}}">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-md-2 control-label">Lastname</label>
        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
        </div>
    </div>
    -->
    <h5>Edit Account</h5>
    <div class="form-group">
        <label for="mail" class="col-md-2 control-label">E-Mail</label>
        <div class="col-md-6 pl-0">
            <input id="mail" type="text" class="form-control" name="mail" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group">
        <label for="mail" class="col-md-2 control-label">Passwort</label>
        <div class="col-md-6 pl-0">
            <input id="mail" type="text" class="form-control" name="mail" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group">
        <label for="mail" class="col-md-2 control-label">Confirm Passwort</label>
        <div class="col-md-6 pl-0">
            <input id="mail" type="text" class="form-control" name="mail" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10 pl-0">
            <button type="submit" class="btn btn-classic">
                <i class="fas fa-save"></i> Change Data
            </button>
        </div>
    </div>
</form>
<form class="form-horizontal" role="form" method="POST" action="/freelancer/settings/reset">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h5 class="pt-5">Reset Account</h5>
    <p>Deletes all clients and project data.</p>
    <div class="form-group">
        <div class="col-md-10 pl-0">
            <button type="submit" class="btn btn-alternative">
                <i class="fas fa-save"></i> Reset Account
            </button>
        </div>
    </div>
</form>

