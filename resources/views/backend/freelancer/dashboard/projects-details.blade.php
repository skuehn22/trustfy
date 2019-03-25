@if(isset($project->state))

<div class="row">
    <div class="col-md-12 pl-5">
        <h4>{{$project->name or ''}}</h4>
    </div>
</div>

<div class="row">

    <div class="col-md-6 pl-5">
        <div class="row">
            <div class="col-md-12 pb-3">
               Client: {{$project->firstname or ''}} {{$project->lastname or ''}}
            </div>
            <div class="col-md-12">
                Address: {{$project->address1 or ''}} <br>{{$project->address2 or ''}} {{$project->city or ''}}
            </div>
        </div>
    </div>

    <div class="col-md-6 pl-5">
        <div class="row">
                <div class="col-md-12 pb-3">
                    Status:   <span class="status {{$project->color or ''}}">&bull;</span> {{$project->state or ''}}
                </div>
                <div class="col-md-12">
                    Plan Creation: {{date('d.m.Y', strtotime($project->date))}}
                </div>
                <div class="col-md-12">
                    @if(is_array($docs))
                        @if($docs != null && count($docs)>0)

                            <span>Attached Documents:</span>

                            @foreach( $docs as $doc)
                                {{$doc->name}}
                            @endforeach
                        @endif
                    @endif
                </div>
        </div>
    </div>


</div>

@if(isset($milestone) && $milestone != null)

    <div class="col-md-12" style="margin-top: -25px;">
        <div class="row">
        <div class="col-md-12">
            <h5>Payments</h5>
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row p-3">
            <div class="col-md-1 p-3 text-left" style="background-color: #006600; color: #fff; font-weight: 600">
                1
            </div>
            <div class="col-md-4 p-3"   style="background-color: #e2e2e2; color: #566787;">
                {{$milestone->name or ''}}
            </div>
            <div class="col-md-4 p-3"   style="background-color: #e2e2e2; color: #566787;">
                @if(isset($milestone->due_at))
                    Due on: {{date('d.m.Y', strtotime($milestone->due_at ))}}
                @endif
            </div>
            <div class="col-md-3 p-3"   style="background-color: #e2e2e2;">
                <span style="color: #566787;">Status:</span>   <span class="status {{$milestone->color or ''}}">&bull;</span> <span style="color: #566787;">{{$milestone->state or ''}}</span>
            </div>
        </div>
    </div>

@endif
@endif
