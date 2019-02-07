@if(isset($clients) && count($clients)>0)
    <select name="{{$para['name'] or ''}}" id="{{$para['id'] or ''}}" class="form-control col-md-{{$para['width'] or ''}}">
            <option value="0">select</option>
        @foreach($clients as $client)
            <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
        @endforeach
    </select>
@else
    <div class="pt-2">
        No clients created yet. <a href="/{{$blade["ll"]}}/freelancer/clients/new">Create Client</a>
    </div>

@endif