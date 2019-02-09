<div class="form-row py-2 pt-3 pl-0 ml-0">
    <h5>General Informations</h5>
</div>
<div class="form-row py-2">
    <label class="col-md-3 col-form-label" for="creation-date">
        Title <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Only for your internal usage"></i>
    </label>

    <input type="text" id="title" name="title" class="form-control col-md-5">
</div>
<div class="form-row py-2">
    <label class="col-md-3 col-form-label" for="creation-date">
        Date
        <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="This date is on the payment plan as the creation date of the plan"></i>
    </label>
    <input type="text" id="creation-date" name="creation-date" class="form-control col-md-5">
</div>
<div class="form-row py-2">
    <label class="col-md-3 col-form-label" for="clients">Client</label>

    @if(count($clients)>0)
        <select name="clients" id="clients" class="col-md-5">
            <option value="0">select</option>
            @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
            @endforeach
        </select>
    @else
        <span id="client-list"></span>

        <div class="pt-2">
            <div  id="no-client">No clients created yet. <a href="#" id="create-client-fly">Create Client</a></div>
        </div>

    @endif
</div>

<div id="projects"></div>

<button class="btn btn-success next-btn" id="next-btn" type="button">Next Step</button>