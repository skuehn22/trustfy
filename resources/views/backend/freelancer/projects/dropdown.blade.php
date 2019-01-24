
<div class="form-row py-2">
    <label class="col-md-2 col-form-label" for="clients">Projects</label>

    @if(count($projects)>0)
        <select name="projects" id="projects" class="col-md-6">
            <option value="0">select</option>
            @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>
    @else
        <div class="pt-2">
            No clients projects yet. <a href="/{{$blade["ll"]}}/freelancer/projects/new">Create Project</a>
        </div>
    @endif

</div>