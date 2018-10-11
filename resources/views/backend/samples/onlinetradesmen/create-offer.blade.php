<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="step1">
                <input type="hidden" id="_hash" value="{{ csrf_token() }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <label for="exampleInputEmail1">Project</label>
                <form class="form-inline" action="#">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" id="project_id" name="project_id" placeholder="Enter Project ID" required>
                    </div>
                    <button type="submit" class="btn btn-success mb-2 find-project">Find</button>
                </form>



                <!--
                <div class="form-group">
                    <label for="exampleInputEmail1">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname" required>
                </div>
                -->
                <br><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Your Offer</label>
                    <input type="number" class="form-control" id="offer_amount" name="offer_amount" placeholder="Enter Amount" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comments</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success setup-payment" style="width:100%; background-color: #FF9340; border-color: #bebebe; border-radius: 2px;">Setup Payment Plan</button>
                </div>
            </div>
            <div class="step2" style="display:none;">
                paymentplan
            </div>

        </div>
        <div class="col-md-4 project" style="display:none;">
            <h1><strong>To move a 2 bar circulation pump from third floor</strong></h1>
            <div class="row">
                <div class="col-md-12">
                    <strong>Trade</strong><br>Plumbing - Existing Property
                </div>
                <div class="col-md-12">
                    <strong>Town</strong><br>Rathgar
                </div>
                <div class="col-md-12">
                    <strong>County</strong><br>Dublin South
                </div>
                <div class="col-md-12">
                    <strong>Your Name:</strong><br>**********
                </div>
                <div class="col-md-12">
                    <strong>our Email:</strong><br>**********
                </div>
                <div class="col-md-12">
                    <strong>Your Mobile Phone:</strong><br>**********
                </div>
                <div class="col-md-12">
                    <strong>Description:</strong><br>To move a 2 bar circulation pump from third floor eaves to the ground floor under the stairs. The position would be adjacent to existing bathroom giving access to pipe work
                </div>

            </div>

            <div class="row button-area" style="display:none;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pay-buttom">Pay Button:</label><br>
                        <p><a class="btn btn-success payin-btn" href="" target="_blank" role="button">Secure Escrow</a></p>
                        <p><textarea rows="2" cols="48" id="pay-button-area"></textarea></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>