<!-- DEMO Create client on the fly -->
<div class="modal fade" id="create-client-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  create-client-modal modal-dialog-centered" role="document" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-body" id="modal-body">
                <div class="clients">
                    <div class="row section-heading">
                        <div class="col-md-6">
                            <h4>New Client</h4>
                        </div>
                    </div>
                    <form id="#client-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row py-2">
                                    <label class="col-md-4 col-form-label" for="client-firstname">Firstname</label>
                                    <input type="text" class="form-control col-md-7" id="client-firstname" name="client-firstname" required>
                                </div>
                                <div class="form-row py-2">
                                    <label class="col-md-4 col-form-label"  for="client-lastname">Lastname</label>
                                    <input type="text" class="form-control col-md-7" id="client-lastname" name="client-lastname" required>
                                </div>
                                <div class="form-row py-2">
                                    <label class="col-md-4 col-form-label"  for="client-mail">Email address</label>
                                    <input type="email" class="form-control col-md-7" id="client-mail" name="client-mail" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row py-2">
                                    <label class="col-md-4 col-form-label"  for="client-phone">Phone</label>
                                    <input type="text" class="form-control col-md-7" id="client-phone" name="client-phone" required>
                                </div>
                                <div class="form-row py-2">
                                    <label class="col-md-4 col-form-label"  for="client-mobile">Mobile</label>
                                    <input type="text" class="form-control col-md-7" id="client-mobile" name="client-mobile" required>
                                </div>
                                <div class="form-row py-2">
                                    <div class="col-md-11 float-right text-right">
                                        <button type="button" class="btn btn-classic-no-width save-client">Save Client</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section("javascript-expanded")
    <script type="text/javascript">

        $(".save-client").on("click", function() {


                //if valid save company in DB
                data = {};
                obj = {
                    "firstname" : $("#client-firstname").val(),
                    "lastname" : $("#client-lastname").val(),
                    "phone" : $("#client-phone").val(),
                    "mobile" : $("#client-mobile").val(),
                    "mail" : $("#client-mail").val(),
                };

                data["clients"] = JSON.stringify(obj);
                var msg = save("save-client", data);
                $('#create-client-modal').modal('hide');
                getClients();


        });

        function getClients() {

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    $('#no-client').hide();
                    $('.client-label').hide();
                    document.getElementById("client-list").innerHTML = xmlhttp.responseText;
                    loadScript();
                }
            }

            xmlhttp.open("GET", "{{env('MYHTTP')}}/{{$blade["ll"]}}/freelancer/clients/get-by-id?width=8&name=clients&id=clients", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();

        }

        function save(url, data) {

            urlAddress = "{{env('MYHTTP')}}/{{$blade["ll"]}}/freelancer/setup/save/" + url;

            if(data != null && Object.keys(data).length > 0) {

                urlAddress += "?";
                for (var k in data) {
                    urlAddress += k + "=" + data[k] + "&";
                }
                urlAddress = urlAddress.slice(0, -1);
            }

            $.ajax({
                type: 'GET',
                url: urlAddress,
                data: { variable: 'value' },
                dataType: 'json',
                success: function(data) {
                    var items = data["success"];

                    if(items == "Client successfully created"){
                        $("#msg").text(items);
                        $(".client-next").text("Next Step").addClass( "btn-success force-next" ).removeClass( "btn-secondary" );

                    }

                }
            });
        }


    </script>
@stop