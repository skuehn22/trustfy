<div class="clients">
    <div class="row">
        <div class="col-md-6">
            <h5>Add a Client</h5>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Create one of your clients</p>
            <form data-toggle="validator" role="form" id="client-data" name="client-data">
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="firstname">Firstname</label>
                    <input type="text" class="form-control col-md-6" id="client-firstname" name="client-firstname" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label"  for="lastname">Lastname</label>
                    <input type="text" class="form-control col-md-6" id="client-lastname" name="client-lastname" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label"  for="mail">Email address</label>
                    <input type="email" class="form-control col-md-6" id="client-mail" name="client-mail" aria-describedby="emailHelp" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label"  for="address">Address</label>
                    <input type="text" class="form-control col-md-6" id="client-address" name="client-address" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label"  for="city">City</label>
                    <input type="text" class="form-control col-md-6" id="client-city" name="client-city" required>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-3 col-form-label" for="country">Country</label>
                    @include('backend.settings.countries', ['default' => $blade['user']->country])
                </div>
                <div class="form-row py-2">
                    <div class="col-md-7 text-right float-right" id="msg" style="color: #00e782; padding-top:5px;">

                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success float-right text-right save-client">Add Client</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-right float-right">
            <!--<button type="button" class="btn btn-outline-secondary skip-btn">Skip</button>-->
        </div>
        <div class="col-md-12 pl-0 pt-3" style="float: right; text-align: right;">

            <div class="btn-group navbar-btn" role="group">
                <button class="btn btn-secondary prev-btn" id="prev-btn" type="button">Back</button>
                <button class="btn btn-secondary next-btn client-next" id="next-btn" type="button">Skip Step</button>
            </div>

        </div>
    </div>

</div>