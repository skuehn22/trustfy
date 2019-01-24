
<form class="form-horizontal" role="form" method="POST" action="#">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-row py-2">
        <label class="col-md-2 col-form-label" for="company">Company</label>
        <input id="company" type="text" class="form-control col-md-10" name="company" value="{{ $company->name or "" }}">
    </div>

    <div class="form-row py-2">
        <label class="col-md-2 col-form-label" for="address">Address</label>
        <input id="address" type="text" class="form-control" name="address" value="{{ $company->address or "" }}">
    </div>

    <div class="form-row py-2">
        <label class="col-md-2 col-form-label" for="country">Country</label>
        <input id="country" type="text" class="form-control" name="country" value="{{ $company->country or "" }}">
    </div>

    <div class="form-row py-2">
        <label class="col-md-2 col-form-label" for="city">City</label>
        <input id="city" type="text" class="form-control" name="city" value="{{ $company->city or "" }}">
    </div>

    <!--
    <div class="form-group">
        <label for="contact" class="col-md-3 control-label">Contact User</label>
        <div class="col-md-6">
            <select class="form-control" required="true" id="contact" name="contact">

                @if(isset($team))
                    @foreach( $team as $member)
                        @if($company->contact_users_fk == $member->id)
                            <option value="{{$member->id}}" disabled selected>{{$member->firstname}} {{$member->lastname}}</option>
                        @else
                            <option value="{{$member->id}}">{{$member->firstname}} {{$member->lastname}}</option>
                        @endif
                    @endforeach
                @endif

            </select>
        </div>
    </div>
    -->
    <div class="form-group">
        <div class="col-md-offset-3 col-md-6">
            <button type="button" class="btn btn-orange save-company">
                <i class="fas fa-save"></i> Save Settings
            </button>
        </div>
    </div>
</form>

