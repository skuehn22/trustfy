<div class="col-lg-12 col-md-12 col-sm-12  p-0">
    <div class="materialbox materialbox-projects p-0">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12 col-md-12">
                    @if(count($projects)>0)
                        <select name="projects-modul" id="projects-modul" class="form-control col-md-12 input-lg">
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">Project: {{$project->name}}</option>
                            @endforeach
                        </select>
                    @else
                        <div class="pt-2">
                            No projects created yet. <a href="/{{$blade["ll"]}}/freelancer/clients/new">Create Project</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer" id="dashboard-projects">

        </div>
    </div>
</div>