
<div class="row">
    <div class="col-md-3 text-left">
        <strong>Project Status:</strong>
    </div>
    <div class="col-md-3">
        <span class="status {{$project->color}}">&bull;</span> {{$project->state}}
    </div>
    <div class="col-md-6">

    </div>
</div>
<div class="row pt-3">
    <div class="col-md-3">
        <strong>Created at:</strong>
    </div>
    <div class="col-md-3">
        {{date('d.m.Y', strtotime($project->created_at))}}
    </div>
    <div class="col-md-3">
        <strong>Client:</strong>
    </div>
    <div class="col-md-3">
        {{ $project->firstname }} {{ $project->lastname }}
    </div>
</div>



<div class="row pt-3">
    <div class="col-md-6">
        <label class="col-md-12 p-0 pb-2 col-form-label" for="plan">Payment Plan:</label>
        @if(count($plans)>0)
        {!! Form::select('plan-details', $plans, null, ['class' => 'form-control col-md-12', 'id' => 'plan-details']) !!}
        @else
            No Payment Plans yet.
        @endif
    </div>
</div>
<div class="row pt-3">
    <div class="col-md-12">
        <div id="dashboard-plan"></div>
    </div>
</div>
