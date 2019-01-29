<label class="col-md-4 col-form-label" for="clients">Client</label>

@if(isset($clients) && count($clients)>0)
    <select name="project-clients" id="project-clients" class="col-md-7">
        @foreach($clients as $client)
            <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
        @endforeach
    </select>
@else
    <div class="pt-2">
        No clients created yet. <a href="/{{$blade["ll"]}}/freelancer/clients/new">Create Client</a>
    </div>

@endif