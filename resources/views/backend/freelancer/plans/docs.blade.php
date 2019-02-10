<div class="form-row py-2 pt-3 pl-0 ml-0">
     <span style="font-weight: 500;">Attached Documents</span>
</div>

@if(isset($docs))
    @foreach($docs as $doc)

        <p><a target="_blank" href="/uploads/companies/contracts/{{$doc->filename}}">{{$doc->name}}</a></p>

    @endforeach
@endif