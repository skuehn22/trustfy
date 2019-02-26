<div class="form-row py-2 pt-0 pl-0 ml-0">
    <h5 class="pt-0">General Informations</h5><br><br>
</div>


    <div class="form-group">
        <div class="form-inline">
            <label class="col-md-2 col-form-label" for="creation-date">
                Title  <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Only for your internal usage"></i>
            </label>
            @if($plan->name)
                <input type="text" id="title" name="title" class="form-control col-md-3" value="{{$plan->name}}" required>
            @else
                <input type="text" id="title" name="title" class="form-control col-md-3" required>
            @endif
            <div class="help-block with-errors"></div>
        </div>
    </div>


    <div class="form-group">
        <div class="form-inline">
            <label class="col-md-2 col-form-label" for="creation-date">
                Date
                 <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="This date is on the payment plan as the creation date of the plan"></i>
            </label>

            @if($plan->date)
                <input type="text" id="creation-date" name="creation-date" class="form-control col-md-3" value="{{ \Carbon\Carbon::parse($plan->date)->format('d/m/Y')}}" required>
            @else
                <input type="text" id="creation-date" name="creation-date" class="form-control col-md-3" required>
            @endif
            <div class="help-block with-errors"></div>
        </div>
    </div>


    <div class="form-group">
        <div class="form-inline">
        <label class="col-md-2 col-form-label" for="clients">Client</label>
        @if(count($clients)>0)
            <select name="clients" id="clients" class="col-md-3" required>
                <option></option>
                @foreach($clients as $client)
                    @if(isset($selected_project) && $client->id == $selected_project->client_id_fk)
                        <option value="{{$client->id}}" selected>{{$client->firstname}} {{$client->lastname}}</option>
                    @else
                        <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}}</option>
                    @endif
                @endforeach
            </select>
            <div class="help-block with-errors"></div>
        @else
            <span id="client-list"></span>

            <div class="pt-2">
                <div  id="no-client">No clients created yet. <a href="#" id="create-client-fly">Create Client</a></div>
            </div>

        @endif
        </div>
    </div>


<div id="projects">

    @if(isset($projects))

        <div class="form-group">
            <div class="form-inline">
                <label class="col-md-2 col-form-label" for="projects-dropdown">Projects</label>
                @if(count($projects)>0)
                    {!! Form::select('projects-dropdown', $projects, $selected_project->id , ['class' => 'form-control col-md-3', 'id' => 'projects-dropdown', 'placeholder' => 'select']) !!}
                @else
                    <div class="pt-2">
                        No projects for this client yet. <a href="/{{$blade["ll"]}}/freelancer/projects/new">Create Project</a>
                    </div>
                @endif
                <div class="help-block with-errors"></div>
            </div>
        </div>
    @endif

</div>
<div class="form-row py-2">
    <div class="col-md-5 pt-1 text-right float-right">
        <button class="btn btn-success next-btn" id="next-btn" type="button">Next</button>
    </div>
</div>

