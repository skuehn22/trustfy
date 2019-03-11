@if(isset($project->state))
<div class="row">
    <div class="col-md-6">
        <div class="row">
        <div class="col-md-12">
            <h4>{{$project->name}}</h4>
        </div>
        <div class="col-md-12">
           Client: {{$project->firstname}} {{$project->lastname}}
        </div>
        <div class="col-md-12">
            Address: {{$project->address1}} {{$project->address2 or ''}} {{$project->city}}
        </div>
        </div>
    </div>

    <div class="col-md-6">
<div class="row">
        <div class="col-md-12 pt-5">
            Status:   <span class="status {{$project->color}}">&bull;</span> {{$project->state}}
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
<div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-12">
            <h5>Payments</h5>
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-1">
                1
            </div>
            <div class="col-md-4">
                {{$milestone->name}}
            </div>
            <div class="col-md-4">
                Due on: {{date('d.m.Y', strtotime($milestone->due_at))}}
            </div>
            <div class="col-md-3">
                Status:   <span class="status {{$milestone->color}}">&bull;</span> {{$milestone->state}}
            </div>
        </div>
    </div>
</div>
@endif
