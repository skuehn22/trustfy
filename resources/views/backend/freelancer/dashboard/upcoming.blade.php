<div class="upcoming">
    <div class="col-lg-12 col-md-12 col-sm-12 p-0">
        <div class="materialbox materialbox-upcoming p-0">
            <div class="card-body pb-1">
                <div class="row">
                    <div class="col-4 col-md-4 pt-3">
                        <div class="text-center">
                            <i class="fas fa-map-marker-alt green"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-6 pt-3 text-center">
                        <div class="">
                            <p class="headline green">Upcoming </br>Payment</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <div class="text">
                   Project: Name<br>
                   Address: Any Street, 123456 Dublin
                </div>
            </div>
        </div>
        <div class="materialbox materialbox-upcoming p-0">
        <div class="col-md-12 pl-5 pt-2 pb-2">
            <p class="green "><strong>Create a payment plan</strong></p>
            @if(count($projects)>0)
                {!! Form::select('projects', $projects, null, ['class' => 'form-control col-md-10', 'id' => 'projects','placeholder' => 'select']) !!}
            @else
                <div class="pt-2">
                    No projects created yet. <a href="/{{$blade["ll"]}}/freelancer/projects/new">Create Project</a>
                </div>
            @endif
            <p class="pt-3"><button type="button" class="btn btn-success col-md-10" id="start-setup">Create Payment Plan</button></p>
        </div>
        </div>
    </div>
</div>