<div class="row bs-wizard" style="border-bottom:0;">
    <div class="col-xs-3 bs-wizard-step progress-step1 complete">
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" id="contract-types" class="bs-wizard-dot modal-btn"></a>
        <div class="text-center bs-wizard-stepnum">Document Type</div>
    </div>

    <div class="col-xs-3 bs-wizard-step progress-step2 active"><!-- complete -->
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="text-center bs-wizard-stepnum">Select Industry</div>
    </div>

    <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="text-center bs-wizard-stepnum">Set Contractors</div>
    </div>

    <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="text-center bs-wizard-stepnum">Set Payment</div>
    </div>
</div>
<div class="clients">
    <div class="row section-heading">
        <div class="col-md-6">
            <h1>New Client</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="/{{$blade["ll"]}}/freelancer/clients/save/0">
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="firstname">Firstname</label>
                    <input type="text" class="form-control col-md-10" id="firstname" name="firstname">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="lastname">Lastname</label>
                    <input type="text" class="form-control col-md-10" id="lastname" name="lastname">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="mail">Email address</label>
                    <input type="email" class="form-control col-md-10" id="mail" name="mail" aria-describedby="emailHelp">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="address">Address</label>
                    <input type="text" class="form-control col-md-10" id="address" name="address">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="city">City</label>
                    <input type="text" class="form-control col-md-10" id="city" name="city">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="country">Country</label>
                    <input type="text" class="form-control col-md-10" id="country" name="country">
                </div>
                <button type="submit" class="btn btn-default float-right text-right">Save Client</button>
            </form>
        </div>
    </div>

</div>