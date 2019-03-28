<div class="inbox-content">
<!-- Nav tabs -->
<ul class="nav nav-tabs p-3 d-none">
    <li class="active-inbox"><a href="#home" data-toggle="tab" id="inbox-start"><span class="glyphicon glyphicon-inbox">
                </span>All</a></li>
    <li><a href="#profile" data-toggle="tab" style="color: #535353;"><span class="glyphicon glyphicon-tags"></span>
            Payments</a></li>
    <li><a href="#messages" data-toggle="tab" style="color: #535353;"><span class="glyphicon glyphicon-user"></span>
            Clients</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane" id="home">
        <div class="list-group">
            @if(count($messages) > 0)
                @foreach($messages as $message)

                    <a class="list-group-item get-details" id="{{$message->id}}">
                        <span class="subject">{{ trans('messages.subject_typ_'.$message->typ) }} </span>

                        @if(isset($message->projectName))
                            <span class="name" style="min-width: 120px; display: inline-block;">{{ trans('index.project') }}: {{$message->projectName or ''}}</span>
                        @endif
                        <br>
                        <span class="text-muted" style="font-size: 11px;">{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y H:i')}}</span>
                        <span class="text-muted" style="font-size: 11px; float:right;">See Details</span>
                    </a>

                @endforeach
            @else
                <p class="no-message">{{ trans('index.no_messages') }}</p>
            @endif
        </div>
        <div class="text-xs-center">
            <div class="col-md-12 text-xs-center">
                {{$messages->links()}}
            </div>
        </div>
    </div>
    <div class="tab-pane fade in" id="profile">
        <div class="list-group">
            <div class="list-group-item">
                <span class="text-center">{{ trans('freelancer_backend.empty') }}</span>
            </div>
        </div>
    </div>
    <div class="tab-pane fade in" id="messages">
        ...</div>
    <div class="tab-pane fade in" id="settings">
        {{ trans('freelancer_backend.empty') }}</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="msgDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-msg" id="modal-title-msg">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"  id="modal-body-msg">

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>