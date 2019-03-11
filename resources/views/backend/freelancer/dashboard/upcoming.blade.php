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
            <div class="card-footer text-center  pt-2 pb-2">
                <div class="text">
                    @if(count($plans)>0 && $upcoming != false)
                       Plan Name: {{ $upcoming->planName or '' }}<br>
                       Due at: {{date('d.m.Y', strtotime($upcoming->due_at))}} - Amount {{ number_format($upcoming->amount, 2) }} €
                    @else
                        No payments yet!.
                    @endif
                </div>
            </div>
        </div>
        <div class="materialbox materialbox-upcoming p-0">
        <div class="col-md-12 pl-5 pt-5 pb-5">
            <p class="headline green">New Payment Plan</p>
            @if(count($clients)>0)
                <form class="form-horizontal" role="form" method="POST" action="/freelancer/plans/new">
                    {!! Form::select('clients', $clients, null, ['class' => 'form-control col-md-10', 'id' => 'clients','placeholder' => 'Select Client', 'required']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p class="pt-3"><button type="submit" class="btn btn-success col-md-10">Create</button></p>
                </form>
            @else
                <div class="pt-2">
                    No projects created yet. <a href="/{{$blade["ll"]}}/freelancer/plans/new">Create Plan</a>
                </div>
            @endif

        </div>
        </div>
    </div>
</div>

