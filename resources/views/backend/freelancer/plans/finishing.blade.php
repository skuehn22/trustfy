<div class="form-row py-2 pt-0 pl-0 ml-0">
    <h5 class="pt-0">Project Information</h5>
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
                    <span class="on">ON</span>
                    <span class="off">OFF</span><!--END-->
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
                <input type="checkbox" name="bt" id="togBtnBt">
                <div class="slider round"><!--ADDED HTML -->
                    <span class="on">ON</span>
                    <span class="off">OFF</span><!--END-->
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
        <span style="font-weight: 500;"> Personal Message
            <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="Will be added to your E-Mail"></i>
        </span>
    </div>
    <div class="form-group">
        <label for="comment">Comment:</label>
        @if($plan->comment)
            <textarea class="form-control col-md-12" rows="4"  name="comment" id="comment">{{$plan->comment}}</textarea>
        @else
            <textarea class="form-control col-md-12" rows="4"  name="comment" id="comment" placeholder="Hi John, &#10;I'm really looking forward to working together! &#10;Best,&#10;Jane"></textarea>
        @endif
    </div>
    <div class="form-row py-2">
        <div class="col-md-12 pt-1 text-right">
            <div class="btn-group sw-btn-group" role="group" >
                <button class="btn btn-secondary prev-btn" id="prev-btn" type="button">Back</button>
                <button class="btn btn-success next-btn load-preview" id="next-btn" type="button">Preview</button>
            </div>
        </div>
    </div>
</div>
</div>