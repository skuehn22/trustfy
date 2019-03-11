
<!-- Startframe -->
<div class="cd-nugget-info d-none">
    <h1>Product Tour</h1>
    <p>Herzlich Willkommen du dicker Dummkopf</p>
    <button id="cd-tour-trigger-step1" class="cd-btn">Start</button>
    <button id="cd-tour-trigger-step2" class="cd-btn d-none">Step 1 of ? </button>
    <button id="cd-tour-trigger-step3" class="cd-btn d-none">Step 2 of ? </button>
    <button id="cd-tour-trigger-step4" class="cd-btn d-none">Step 3 of ? </button>
    <button id="cd-tour-trigger-step5" class="cd-btn d-none">Finished</button>
    <button id="cd-tour-trigger-step6" class="cd-btn d-none">Finished</button>
</div>


<!-- single steps -->
<ul class="cd-tour-wrapper d-none">

    <li class="cd-single-step tour-step-1">
        <span>Step 1</span>

        <div class="cd-more-info right">
            <h2>Dashboard</h2>
            <p>Here you can get an overview of everything</p>
            <button id="step-trigger-1" class="btn btn-secondary">Next</button>
            <img src="/img/step-1.png" alt="step 1">
        </div>
    </li>


    <li class="cd-single-step tour-step-2">
        <span>Step 2</span>

        <div class="cd-more-info right">
            <h2>Create Company</h2>
            <p>Here you can enter information about your company</p>
            <a href="/freelancer/settings" class="btn btn-secondary">ok</a>
            <img src="/img/step-1.png" alt="step 1">
        </div>
    </li> <!-- .cd-single-step -->

    <li class="cd-single-step tour-step-3">
        <span>Step 2</span>

        <div class="cd-more-info bottom">
            <h2>Save Company</h2>
            <p>Make your entries and save.</p>
            <img src="/img/step-2.png" alt="step 2">
        </div>
    </li> <!-- .cd-single-step -->

    <li class="cd-single-step tour-step-4">
        <span>Step 3</span>

        <div class="cd-more-info right">
            <h2>Create a client</h2>
            <p>Here you can create your first customer.</p>
            <a href="/freelancer/clients/new" class="btn btn-secondary">ok</a>
            <img src="/img/step-3.png" alt="step 3">
        </div>
    </li>

    <li class="cd-single-step tour-step-5">
        <span>Step 3</span>

        <div class="cd-more-info bottom">
            <h2>Save client</h2>
            <p>Make your entries and save.</p>
            <img src="/img/step-3.png" alt="step 3">
        </div>
    </li>


    <li class="cd-single-step tour-step-6">
        <span>Step 3</span>

        <div class="cd-more-info right">
            <h2>Congratulation </h2>
            <p>You can now set up your first payment plan.</p>
            <a href="/freelancer/plans/new" class="btn btn-secondary">Sounds good</a>
            <img src="/img/step-3.png" alt="step 3">
        </div>
    </li>



</ul>
<div class="cd-app-screen d-none"></div>
<div class="cd-cover-layer"></div>


@section("javascript-expanded")
    <script type="text/javascript">

        /*Demo Tour */

        $(document).ready(function () {


            if($("#tour").length && $("#tour").val() == "true"){

                $(".cd-tour-wrapper").removeClass('d-none');
                $(".cd-nugget-info").removeClass('d-none');
                $(".cd-app-screen").removeClass('d-none');
                $(".blur-dashboard").addClass('blur');
                $(".cd-tour-nav").addClass('d-none');

            }

        });


        // External Button Events
        $("#cd-tour-trigger-step2").on("click", function() {
            $(".dashboard-sidebar").removeClass('active');
            $(".settings-sidebar").addClass('active');
        });


        $("#cd-tour-trigger-step1").on("click", function() {

            /*The Info Box with the Steps in it */
            $(".cd-app-screen").removeClass('d-none').addClass('cd-app-screen-step0').removeClass('cd-app-screen');
            $(".cd-nugget-info").removeClass('d-none').addClass('cd-nugget-info-step0').removeClass('cd-nugget-info');
            $("#cd-tour-trigger-step1").removeClass('d-none');
            $(".cd-nugget-info-step0").addClass('d-none');


            /*the real steps */
            $(".tour-step-1").addClass('is-selected');
            $(".blur-dashboard").removeClass('blur');

        });


        $("#step-trigger-1").on("click", function() {

            /*the real steps */
            $(".tour-step-1").removeClass('is-selected');
            $(".tour-step-2").addClass('is-selected');
            $(".dashboard-sidebar").removeClass('active');
            $(".settings-sidebar").addClass('active');


        });


        if($("#tour").length && $("#tour").val() == "trueb"){
            $(".cd-app-screen").removeClass('d-none').addClass('cd-app-screen-step2').removeClass('cd-app-screen');
            $(".cd-nugget-info").removeClass('d-none').addClass('cd-nugget-info-step2').removeClass('cd-nugget-info');
            $("#cd-tour-trigger-step2").removeClass('d-none');
        }


    </script>

@endsection