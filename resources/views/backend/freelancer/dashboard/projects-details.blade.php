
<div class="row">
    <div class="col-md-2 text-left">
        <strong>Project Status:</strong>
    </div>
    <div class="col-md-4">
        <span class="status {{$project->color}}">&bull;</span> {{$project->state}}
    </div>
    <div class="col-md-6">

    </div>
</div>
<div class="row pt-3">
    <div class="col-md-2 ">
        <strong>Created at:</strong>
    </div>
    <div class="col-md-4">
        {{date('d.m.Y', strtotime($project->created_at))}}
    </div>
    <div class="col-md-2">
        <strong>Client:</strong>
    </div>
    <div class="col-md-4">
        {{ $project->firstname }} {{ $project->lastname }}
    </div>
</div>
<div class="row pt-3">
    <div class="col-md-5">
        <label class="col-md-4 p-0 pb-2 col-form-label" for="plan">Payment Plan:</label>
        {!! Form::select('plan-details', $plans, null, ['class' => 'form-control col-md-12', 'id' => 'plan-details']) !!}
    </div>
</div>
<div class="row pt-3">
    <div class="col-md-12">
        <div id="dashboard-plan"></div>
    </div>
</div>
