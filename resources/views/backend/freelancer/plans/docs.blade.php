<div class="form-row py-2 pt-3 pl-0 ml-0">
    <h5>Attached Documents</h5>
</div>

@if(isset($docs))
    @foreach($docs as $doc)

        <p><a target="_blank" href="/uploads/companies/contracts/{{$doc->filename}}">{{$doc->name}}</a></p>

    @endforeach
@endif