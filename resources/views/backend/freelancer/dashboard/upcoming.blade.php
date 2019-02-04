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
                    @if(count($plans)>0)
                       Project: Name<br>
                       Address: Any Street, 123456 Dublin
                    @else
                        No Payment Plans yet.
                    @endif
                </div>
            </div>
        </div>
        <div class="materialbox materialbox-upcoming p-0">
        <div class="col-md-12 pl-5 pt-2 pb-2">
            <p class="green "><strong>Create a payment plan</strong></p>
            @if(count($projects)>0)
                <form class="form-horizontal" role="form" method="POST" action="/freelancer/plans/new">
                {!! Form::select('projects', $projects, null, ['class' => 'form-control col-md-10', 'id' => 'projects','placeholder' => 'select']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p class="pt-3"><button type="submit" class="btn btn-success col-md-10">Create Payment Plan</button></p>
                </form>
            @else
                <div class="pt-2">
                    No projects created yet. <a href="/{{$blade["ll"]}}/freelancer/projects/new">Create Project</a>
                </div>
            @endif

        </div>
        </div>
    </div>
</div>

