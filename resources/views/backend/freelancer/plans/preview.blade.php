<div class="col-md-6 plan-preview align-middle">
    <div class="col-md-12 p-0 pt-5 text-md-center">
        <h5 class="font-italic">-Preview-</h5>
        <br><br><br><br><br>
        @if(isset($blade["user"]->logo))
            <img src="/uploads/companies/logo/{{$blade["user"]->logo}}" style="width:300px;">
        @endif
        <br><br>
        <h5>Payment Plan</h5>
        <p>between</p>
        <p>{{$blade["user"]->firstname}} {{$blade["user"]->lastname}} - Principal</p>
        <p>and</p>
        <div id="marker-client"></div>
        <div class="preview-project d-none">
            <h5>Project</h5>
            <div id="marker-project"></div>
        </div>
    </div>
</div>