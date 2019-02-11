<div class="form-row py-2 pt-0 pl-0 ml-0">
    <h5 class="pt-0">Completion of your plan</h5>
</div>
<div class="row">
<hr>
<div class="col-md-6 pl-5">
    <div class="form-row py-2">
        <span style="font-weight: 500;"> Payment Methods
            <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Payment Methode you would allow your Client."></i>
        </span>
    </div>
    <div class="form-row py-2">
        <div class="col-md-4">
            Credit Card:
        </div>
        <div class="col-md-3">
            <label class="switch">
                <input type="checkbox" name="cc" id="togBtn">
                <div class="slider round"><!--ADDED HTML -->
                    <span class="on">ON</span><span class="off">OFF</span><!--END-->
                </div>
            </label>
        </div>
    </div>
    <div class="form-row py-2">
        <div class="col-md-4">
           Bank Transfer:
        </div>
        <div class="col-md-3">
            <label class="switch">
                <input type="checkbox" name="bt" id="togBtn">
                <div class="slider round"><!--ADDED HTML -->
                    <span class="on">ON</span><span class="off">OFF</span><!--END-->
                </div>
            </label>
        </div>
    </div><!--
    <div class="form-row py-2">
        <span style="font-weight: 500;"> Delivery Options
            <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="How would you like to send your payment plan"></i>
        </span>
    </div>-->

</div>
<div class="col-md 6">
    <div class="form-row py-2">
        <span style="font-weight: 500;"> Additional Notes
            <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Will be added to your E-Mail"></i>
        </span>
    </div>
    <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control col-md-12" rows="4"  name="comment" id="comment"></textarea>
    </div>
    <div class="form-row py-2">
        <div class="col-md-12 pt-2 float-right text-right">
            <div class="btn-group mr-2 sw-btn-group" role="group" >
                <button class="btn btn-secondary prev-btn" id="prev-btn" type="button">Back</button>
                <button class="btn btn-success next-btn" style="width: 230px;" id="next-btn" disabled type="button">Send Payment Plan to Client</button>
            </div>
        </div>
    </div>
</div>
</div>