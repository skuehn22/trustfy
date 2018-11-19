<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trustfy - Reviews for Freelancers</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="icon" type="image/png" href="/favicon-tf.ico">


    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/new-age.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <img src="img/trustfy-new-mixed.png" style="max-width: 200px;" class="img-fluid logo-desktop">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#download">Create a review</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#features">Features</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            @if(session()->has('message'))
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                </div>
            @endif
            <div class="col-lg-7 my-auto">
                <div class="header-content mx-auto">
                    <h1 class="mb-5">We build trust between freelancers and their clients</h1>
                    <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Start Now for Free!</a>
                </div>
            </div>
            <div class="col-lg-5 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="img/trustyfy-screenshot.png" class="img-fluid logo-desktop" alt="">

                            </div>
                            <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="download bg-primary text-center" id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-heading">You can start now and collect your first reviews</h2>
                <!--<p>Be the first to test it out, we’ll be fully launching soon</p>-->

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="badges">
                    <form class="form-inline" method="POST" action="{{ asset('en/create-rating') }}">
                        <div class="input-group" style="width: 100%;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="btn btn-lg" name="email" id="email" type="email" placeholder="Enter email" required>
                            <button class="btn btn-info btn-lg" type="submit">Go!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Endless new Opportunities</h2>
            <p class="text-muted">Check out what our review system can do for you!</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-4 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait black">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="img/demo-screen-2.png" class="img-fluid" alt="">
                            </div>
                            <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 my-auto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="fas fa-fist-raised text-primary"></i>
                                <h3>Independent Reviews</h3>
                                <p class="text-muted">Your ratings no longer belong to marketplaces</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="fas fa-desktop text-primary"></i>
                                <h3>Flexible Use</h3>
                                <p class="text-muted">Showcase your reviews on your website or send clients to our directory</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="fas fa-star text-primary"></i>
                                <h3>Build up Reputation</h3>
                                <p class="text-muted">Let customers leave reviews and showcase your hard-earned praise</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="fas fa-rocket text-primary"></i>
                                <h3>More customers</h3>
                                <p class="text-muted">create your personal brand and stand out from the crowd</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta">
    <div class="cta-content">
        <div class="container">
            <h2>Stop waiting.<br>Start building trust.</h2>
            <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
        </div>
    </div>
    <div class="overlay"></div>
</section>

<section class="contact bg-primary" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" style="text-align: center; ">
                <h4>Be the first to test new features, stay up to date on our progress and help us build the product you want!</h4>
                <div class="badges">

                    <form class="form-inline" method="POST" action="/newsletter">
                        <div class="input-group" style="width: 100%;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="btn btn-lg" name="email" id="email" type="email" placeholder="Enter email" required>
                            <button class="btn btn-info btn-lg" type="submit">Sign Up</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>



<footer id="contact">
    <div class="container">
        <form id="ratingForm" method="POST" action="/send-message">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="offset-md-3 col-md-5">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h3>Contact</h3>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Your E-Mail">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" rows="4" id="message" name="message" placeholder="Your Message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <input class="btn btn-info" type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-md-12">
            <p>&copy; trustfy.io 2018. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/new-age.min.js"></script>

</body>

</html>
