<div class="form-row py-2">
    <label class="col-md-2 col-form-label" for="creation-date">
        Title <i class="fas fa-info-circle green" data-toggle="tooltip" data-placement="top" title="For example Deposit / Down payment"></i>
    </label>

    @if($milestones->name)
        <input type="text" id="title-milestone" name="title-milestone" class="form-control col-md-3" value="{{$milestones->name}}">
    @else
        <input type="text" id="title-milestone" name="title-milestone" class="form-control col-md-3">
    @endif

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

    @if($milestones->due_at)
        <input type="text" id="due-date" name="due-date" class="form-control col-md-3" value="{{$milestones->due_at}}">
    @else
        <input type="text" id="due-date" name="due-date" class="form-control col-md-3">
    @endif


</div>

<div class="form-row py-2 amount d-none">
    <label class="col-md-2 col-form-label" for="single-amount">Amount</label>

    @if($milestones->amount)
        <input type="text" id="single-amount" name="single-amount" class="form-control col-md-3" value="{{$milestones->amount}}">
    @else
        <input type="text" id="single-amount" name="single-amount" class="form-control col-md-3">
    @endif

</div>