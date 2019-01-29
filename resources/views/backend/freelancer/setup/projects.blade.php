<div class="clients">
    <div class="row">
        <div class="col-md-6">
            <h5>Create a Projects</h5>

        </div>
    </div>
    <form action="/{{$blade["ll"]}}/freelancer/projects/save/0">
    <div class="row">
       <div class="col-md-12">
           <p>Give us some information about a project that you would like to charge.</p>

       </div>
        <div class="col-md-6">
            <h5>General Informations</h5>
            <div class="form-row py-2 client-list" id="client-list"></div>
            <div class="form-row py-2">
                <label class="col-md-4 col-form-label" for="name">Name</label>
                <input type="text" class="form-control col-md-8" id="name" name="name">
            </div>
            <div class="form-row py-2">
                <label class="col-md-4 col-form-label"  for="description">Description</label>
                <textarea class="form-control col-md-8" rows="5" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-default float-right text-right">Save Project</button>
        </div>
        <div class="col-md-6">
            <h5>Address optional</h5>
            <div class="form-row py-2">
                <label class="col-md-3 col-form-label"  for="street">Street</label>
                <input type="text" class="form-control col-md-8" id="street" name="street">
            </div>
            <div class="form-row py-3">
                <label class="col-md-3 col-form-label"  for="city">City</label>
                <input type="text" class="form-control col-md-8" id="city" name="city">
            </div>
            <div class="form-row py-2">
                <label class="col-md-3 col-form-label"  for="country">Country</label>
                <input type="text" class="form-control col-md-8" id="country" name="country">
            </div>
        </div>
        <div class="col-md-12 pl-0 pt-3" style="float: right; text-align: right;">

            <div class="btn-group navbar-btn" role="group">
                <button class="btn btn-secondary prev-btn" id="prev-btn" type="button">Back</button>&nbsp;&nbsp;
                <button class="btn btn-success next-btn" id="next-btn" type="button">Next Step</button>
            </div>

        </div>
    </div>
    </form>
</div>