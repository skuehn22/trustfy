<div class="form-row py-2 pt-0 pl-0 ml-0">
    <h5 class="pt-0">Payment Plan</h5>
</div>
<div class="form-row py-2">
    <label class="col-md-2 col-form-label" for="typ">Typ</label>
    {!! Form::select('typ', $types, null , ['class' => 'form-control col-md-3', 'id' => 'typ', 'placeholder' => 'select']) !!}
</div>
<div id="plan-typ-response"></div>
<div class="form-row py-2">
    <div class="col-md-6 pt-5">
        <button class="btn btn-success next-btn" id="next-btn" type="button">Next Step</button>
    </div>
</div>
