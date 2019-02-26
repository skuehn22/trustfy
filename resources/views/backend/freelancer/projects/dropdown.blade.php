
<div class="form-row py-2">
    <label class="col-md-2 col-form-label" for="projects-dropdown">Projects</label>

    @if(count($projects)>0)

        @if(count($projects) == 1)
            <select name="projects-dropdown" id="projects-dropdown" class="col-md-3">
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
        @else
            <select name="projects-dropdown" id="projects-dropdown" class="col-md-3">
                <option value="0">select</option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
        @endif
    @else
        <div class="pt-2">
            No projects for this client yet. <a href="/{{$blade["ll"]}}/freelancer/projects/new">Create Project</a>
        </div>
    @endif

</div>