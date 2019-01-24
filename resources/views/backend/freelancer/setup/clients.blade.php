<div class="clients p-3">
    <div class="row section-heading">
        <div class="col-md-6">
            <p>New Client</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="/{{$blade["ll"]}}/freelancer/clients/save/0">
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="firstname">Firstname</label>
                    <input type="text" class="form-control col-md-6" id="firstname" name="firstname">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="lastname">Lastname</label>
                    <input type="text" class="form-control col-md-6" id="lastname" name="lastname">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="mail">Email address</label>
                    <input type="email" class="form-control col-md-6" id="mail" name="mail" aria-describedby="emailHelp">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="address">Address</label>
                    <input type="text" class="form-control col-md-6" id="address" name="address">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="city">City</label>
                    <input type="text" class="form-control col-md-6" id="city" name="city">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="country">Country</label>
                    @include('backend.settings.countries', ['default' => $blade['user']->country])
                </div>
                <!--<button type="submit" class="btn btn-default float-right text-right">Save Client</button>-->
            </form>
        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-12 pl-0 pt-3" style="float: right; text-align: right;">

            <div class="btn-group navbar-btn" role="group">
                <button class="btn btn-success prev-btn" id="prev-btn" type="button">Back</button>
                <button class="btn btn-success next-btn" id="next-btn" type="button">Next</button>
            </div>

        </div>
    </div>

</div>