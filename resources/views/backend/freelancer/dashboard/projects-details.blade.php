@if(isset($project->state))
<div class="row p-3">
    <div class="col-md-6">
        <div class="row">
        <div class="col-md-12 pb-2">
            <h4>{{$project->name or ''}}</h4>
        </div>
        <div class="col-md-12 pb-3">
           Client: {{$project->firstname or ''}} {{$project->lastname or ''}}
        </div>
        <div class="col-md-12">
            Address: {{$project->address1 or ''}} {{$project->address2 or ''}} {{$project->city or ''}}
        </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row p-3">
                <div class="col-md-12 pt-5  pb-3">
                    Status:   <span class="status {{$project->color or ''}}">&bull;</span> {{$project->state or ''}}
                </div>
                <div class="col-md-12">
                    Plan Creation: {{date('d.m.Y', strtotime($project->date))}}
                </div>
                <div class="col-md-12">
                    @if($docs != null && count($docs)>0)

                        <span>Attached Documents:</span>

                        @foreach( $docs as $doc)
                            {{$doc->name}}
                        @endforeach
                    @endif

                </div>
        </div>
    </div>
</div>

@if(isset($milestone) && $milestone != null)
<div class="row p-3">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-12">
            <h5>Payments</h5>
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row p-3">
            <div class="col-md-1 p-3 text-center"   style="background-color: #006600; color: #fff; font-weight: 600">
                1
            </div>
            <div class="col-md-4 p-3"   style="background-color: #bfbfbf; color: #fff;">
                {{$milestone->name or ''}}
            </div>
            <div class="col-md-4 p-3"   style="background-color: #bfbfbf; color: #fff;">
                @if(isset($milestone->due_at))
                    Due on: {{date('d.m.Y', strtotime($milestone->due_at ))}}
                @endif
            </div>
            <div class="col-md-3 p-3"   style="background-color: #bfbfbf;">
                <span style="color: #fff;">Status:</span>   <span class="status {{$milestone->color or ''}}">&bull;</span> <span style="color: #fff;">{{$milestone->state or ''}}</span>
            </div>
        </div>
    </div>
</div>
@endif
@endif
