<div class="form-row py-2 pt-3 pl-0 ml-0">
     <span style="font-weight: 500;">Attached Documents</span>
</div>

@if(isset($docs))
    @foreach($docs as $doc)

        <p class="{{$doc->id}}">
            <a target="_blank" href="/uploads/companies/contracts/{{$doc->filename}}">{{$doc->name}}</a>
            <a href="#" data-id="{{$doc->id}}" data-toggle="tooltip" data-placement="top" title="" class="delete-doc" data-original-title="Delete">
                <i class="fas fa-trash green"></i>
            </a>
        </p>

    @endforeach
@endif


