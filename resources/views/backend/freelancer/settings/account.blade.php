<div class="row">
    <div class="col-md-6">
        <form class="form-horizontal" role="form" method="POST" action="/freelancer/settings/change-password">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4 class="pb-3">Edit Account</h4>
            <div class="form-group">
                <label for="email" class="col-md-5 control-label  pl-0">E-Mail</label>
                <div class="col-md-8 pl-0">
                    <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-5 control-label  pl-0">New Password</label>
                <div class="col-md-8 pl-0">
                    <input id="password" type="password" class="form-control" name="password" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-md-5 control-label  pl-0">Confirm New Password</label>
                <div class="col-md-8 pl-0">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="">
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
    </div>
    <div class="col-md-6">
        <h4  class="pt-3">Manage Database</h4>
        <div class="row">
            <div class="col-md-6 pt-0">
                <form class="form-horizontal" role="form" method="POST" action="/freelancer/settings/reset">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h5 class="pt-5">Reset Account</h5>
                    <p>Deletes all clients and project data.</p>
                    <div class="form-group">
                        <div class="col-md-10 pl-0">
                            <button type="submit" class="btn btn-alternative">
                                <i class="fas fa-trash-alt"></i> Reset Account
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h5 class="pt-5">Installation Demo Data</h5>
                <p>Installs a package with demo data.</p>
                <div class="form-group">
                    <div class="col-md-10 pl-0">
                        <button type="button" class="btn btn-info" id="install-demo" style="width: 200px;">
                            <i class="fas fa-plus-square"></i> Install Demo
                        </button>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
