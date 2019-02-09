<div class="form-row py-2 pt-5 pl-0 ml-0">
    <h5>Payment Plan</h5>
</div>
<div class="form-row py-2">
    <label class="col-md-3 col-form-label" for="typ">Typ</label>
    {!! Form::select('typ', $types, null , ['class' => 'form-control col-md-5', 'id' => 'typ', 'placeholder' => 'select']) !!}
</div>
<div id="plan-typ-response"></div>
<button class="btn btn-success next-btn" id="next-btn" type="button">Next Step</button>