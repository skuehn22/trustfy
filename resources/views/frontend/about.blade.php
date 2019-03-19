@extends('frontend.masters.master-trustfy')

@section('seo')
    <title>Trustfy About Us</title>
    <meta name="description" content="Here you will find the most frequently asked questions">


@section('css')
    <style>


        footer {
            text-align: center;
            color: rgba(255, 255, 255, 0.3);
            background-color: #222222;
            position: absolute;
            right: 0;
            bottom: -80px;
            left: 0;
        }



    </style>
@endsection

@section('content')
    <div class="container" style="background-color: #fff;">
        <br><br>
        <div class="row">
            <div class="col-xs-12 col-md-12 content">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <h1>About Us</h1>
                        <p>&nbsp;</p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">

                        <p><i><strong>"My dad was a contractor, so I grew up watching him struggle to get paid.
                                    Chasing a payment after he'd done good work really chipped away at his
                                    pride.</strong></i></p>

                        <p><i><strong>When I started freelancing myself, I got to feel that first hand.</strong></i></p>
                        <p><i><strong>I want to change the way things are done because no one should have to
                                    worry if their money is safe. Not freelancers. Not clients."</strong></i></p>
                        <p><strong>Sebastian<br>Co-founder and CTO</strong></p>
                    </div>
                  <div class="col-xs-12 col-md-4">
                      <img src="img/sebastian.jpg" class="img-responsive rounded-circle" style="width:250px;" alt="Sebastian - Trustfy">
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 content">
                <br><br>

                <p style="text-align: justify">We founded Trustfy because we want to make the future of work fairer, more
                    transparent and more sustainable for everyone involved.
                    It’s why we get up in the morning.</p>
                <p style="text-align: justify">
                    More and more people are working for themselves and that has the potential to
                    be a great thing.</p>
                <p style="text-align: justify">But it also means clients don’t have the security of working with a larger firm
                    and freelancers don’t have the security of a full-time employer.</p>
                <p style="text-align: justify">When it comes to paying and getting paid, that can cause issues for everyone
                    involved. We, and a lot of people we care dearly about, have lost the better part
                    of our sanity in this process.</p>
                <p style="text-align: justify">As a client, you’re asked to pay a good chunk of the bill up front- then you cross
                    your fingers that everything works out.</p>

                <p style="text-align: justify">As a freelancer, you do the work and cross your fingers that you won’t be
                    chasing payments later.</p>

<p style="text-align: justify">It’s stressful for everyone involved. And it’s unnecessary.
    That's why we're making the system fairer, so that everyone involved can have
    the peace of mind they deserve.</p>
<br><br><br><br>
            </div>
        </div>
    </div>
@endsection
