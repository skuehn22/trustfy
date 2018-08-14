
            <fieldset class="scheduler-border">
                <legend class="scheduler-border">Übersicht</legend>
                <table class="table table-bordered display" id="myTable">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Firma</th>
                        <th>Adresse</th>
                        <th>PLZ</th>
                        <th>Stadt</th>
                        <th>Land</th>
                        <th>Typ</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td style="width:30px"><input type="checkbox" class="radio" value="{{$client->id}}" name="check"></td>
                            <td>{{$client->lastname}}</td>
                            <td>{{$client->firstname}}</td>
                            <td>{{$client->company}}</td>
                            <td>{{$client->address}}</td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td style="text-align: center">

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </fieldset>
