<div class="form-row py-2">
    <label class="col-md-2 col-form-label" for="creation-date">
        Title <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="For example Deposit / Down payment"></i>
    </label>

    @foreach($milestones as $milestone)
        @if($milestone->name)
            <input type="text" id="title-milestone" name="title-milestone" class="form-control col-md-3" value="{{$milestone->name}}">
        @else
            <input type="text" id="title-milestone" name="title-milestone" class="form-control col-md-3">
        @endif
    @endforeach


</div>
<div class="form-row py-2">
    <label class="col-md-2 col-form-label" for="pay-due">To Pay At</label>

    <select class="form-control col-md-3" name="pay-due" id="pay-due">
        <option value="0">select</option>
        <option value="1">Project Start</option>
        <option value="2">Project End</option>
        <option value="3">Specific Date</option>
    </select>

</div>

<div class="form-row py-2 due d-none">
    <label class="col-md-2 col-form-label" for="due-date">Due Date</label>
    <input type="text" id="due-date" name="due-date" class="form-control col-md-3">
</div>

<div class="form-row py-2 amount d-none">
    <label class="col-md-2 col-form-label" for="single-amount">Amount</label>
    <input type="text" id="single-amount" name="single-amount" class="form-control col-md-3">
</div>