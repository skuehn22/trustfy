<div class="clients">
    <div class="row">
        <div class="col-md-6">
            <h5>Create a Projects</h5>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Give us some information about a project that you would like to charge.</p>
            <form action="/{{$blade["ll"]}}/freelancer/projects/save/0">
                <div class="form-row py-2">
                    <h5>General Informations</h5>
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="clients">Client</label>

                    @if(isset($clients) && count($clients)>0)
                        <select name="clients" id="clients" class="col-md-10">
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
                            @endforeach
                        </select>
                    @else
                        <div class="pt-2">
                            No clients created yet. <a href="/{{$blade["ll"]}}/freelancer/clients/new">Create Client</a>
                        </div>

                    @endif
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label" for="name">Name</label>
                    <input type="text" class="form-control col-md-10" id="name" name="name">
                </div>
                <div class="form-row py-2">
                    <label class="col-md-2 col-form-label"  for="description">Description</label>
                    <textarea class="form-control col-md-10" rows="5" id="description" name="description"></textarea>
                </div>

                <button type="submit" class="btn btn-default float-right text-right">Save Project</button>
            </form>
        </div>
        <div class="col-md-6 text-right float-right">
            <div class="form-row py-2">
                <h5>Address optional</h5>
            </div>
            <div class="form-row py-2">
                <label class="col-md-2 col-form-label"  for="address">Street</label>
                <input type="text" class="form-control col-md-10" id="street" name="street">
            </div>
            <div class="form-row py-2">
                <label class="col-md-2 col-form-label"  for="city">City</label>
                <input type="text" class="form-control col-md-10" id="city" name="city">
            </div>
            <div class="form-row py-2">
                <label class="col-md-2 col-form-label"  for="country">Country</label>
                <input type="text" class="form-control col-md-10" id="country" name="country">
            </div>
        </div>
        <div class="col-md-12 pl-0 pt-3" style="float: right; text-align: right;">

            <div class="btn-group navbar-btn" role="group">
                <button class="btn btn-secondary prev-btn" id="prev-btn" type="button">Back</button>
                <button class="btn btn-success next-btn" id="next-btn" type="button">Next Step</button>
            </div>

        </div>
    </div>

</div>