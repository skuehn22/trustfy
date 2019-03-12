<div class="col-lg-12 col-md-12 col-sm-12  p-0">
    <div class="materialbox materialbox-projects p-0">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12 col-md-12">

                    <div class="btn-group btn-block">
                        <button class="btn btn-block btn-secondary btn-lg dropdown-toggle text-left" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select payment plan for details
                        </button>

                        @if(count($plans)>0)
                            <div class="dropdown-menu btn-block ">
                                @foreach($plans as $plan)
                                    <a class="dropdown-item" data-id="{{$plan->id}}" href="#">{{$plan->name}}</a>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <div id="dashboard-projects"></div>
                </div>
            </div>
        </div>
    </div>
</div>