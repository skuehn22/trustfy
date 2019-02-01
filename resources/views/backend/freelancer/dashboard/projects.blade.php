<div class="col-lg-12 col-md-12 col-sm-12  p-0">
    <div class="materialbox materialbox-projects p-0">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12 col-md-12">
                    @if(count($projects)>0)
                        {!! Form::select('projects-modul', $projects, null, ['class' => 'form-control col-md-12 input-lg', 'id' => 'projects-modul']) !!}
                    @else
                        <div class="pt-2">
                            No projects created yet. <a href="/{{$blade["ll"]}}/freelancer/projects/new">Create Project</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer" id="dashboard-projects">

        </div>
    </div>
</div>