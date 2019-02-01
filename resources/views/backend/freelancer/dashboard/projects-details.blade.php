<div class="row">
    <div class="col-md-6">
        Created at: {{date('d.m.Y', strtotime($project->created_at))}}
    </div>
    <div class="col-md-6">
        Client: {{ $project->firstname }} {{ $project->lastname }}
    </div>
</div>