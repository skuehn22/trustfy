<div class="proposal-create">
    <div class="row">
        <div class="col-md-12">
            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12" style="padding-left:25px;">
                            @include('backend.documents.progress-bar-step3')
                        </div>
                    </div>
                    <div class="row" style="padding-top: 25px; ">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="name_provider" class="control-label">Your Company</label>
                                <input style="border: none; box-shadow: none; padding:0px; line-height: normal;" type="text" id="name_provider" class="form-control" name="name_provider" required value="{{$provider->name}}"/>
                                <input style="border: none; box-shadow: none; padding:0px; line-height: normal;" type="text" id="address_provider" class="form-control" name="address_provider" required value="{{$provider->address}}"/>
                                <input style="border: none; box-shadow: none; padding:0px; line-height: normal;" type="text" id="city_provider" class="form-control" name="city_provider" required value="{{$provider->city}}"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="clients" class="control-label">For Client</label>
                                <select class="form-control" name="clients" id="clients">
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->lastname}}, {{$client->firstname}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="date_proposal">Offer Date</label>
                                <input
                                        type="text"
                                        data-date-autoclose="true"
                                        data-date-clear-btn="true"
                                        data-date-format="dd.mm.yyyy"
                                        data-date-language="fr"
                                        data-date-today-highlight="true"
                                        data-date-end-date="+2m"
                                        data-date-start-date="-3d"
                                        data-provide="datepicker"
                                        class="form-control"
                                        name="date-proposal"
                                        id="date-proposal"/>
                            </div>
                            <div class="form-group">
                                <label for="date_proposal">Expires Date</label>
                                <input
                                        type="text"
                                        data-date-autoclose="true"
                                        data-date-clear-btn="true"
                                        data-date-format="dd.mm.yyyy"
                                        data-date-language="fr"
                                        data-date-today-highlight="true"
                                        data-date-end-date="+2m"
                                        data-date-start-date="-3d"
                                        data-provide="datepicker"
                                        class="form-control"
                                        name="expires-date"
                                        id="expires-date"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: right;">
                            <button type="submit" class="btn btn-orange load-modul" id="save-proposal-blank">Next Step</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>