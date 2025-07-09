<?php
include 'common/header_start.php';
include 'common/header_end.php';
?>

<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">contact </h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">you can contact me on this page</h2>
                <a class="btn btn-primary" href="">Click me</a>
            </div>
        </div>
    </div>
</header>

<!-- Contact -->
<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">Contact me!</h2>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form action="submit.php" method="POST" class="form-signup" id="">
                    <!-- Email address input-->
                    <div class="row input-group-newsletter" style="margin-bottom: 20px;">
                        <div class="col"><input class="form-control" id="name" type="name" placeholder="name" name="name" aria-label="Enter name..." /></div>
                    </div>

                    <div class="row input-group-newsletter" style="margin-bottom: 20px;">
                        <div class="col"><input class="form-control" id="message" type="message" placeholder="message" name="message" aria-label="Enter message..." /></div>
                    </div>

                    <div class="row input-group-newsletter">
                        <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="email" name="email" aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                    </div>
                    <div class="col-auto"><button class="btn btn-primary" id="submitButton" type="submit">Send!</button></div>

                </form>
                <input id = "getDataBtn" type="button" value="click me" />
            </div>
        </div>
    </div>
</section>
<!-- Contact Info-->
<section class="contact-section bg-black">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Address</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">47 W 13th St, New York, NY 10011, USA</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Gmail</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50"><a href="#!">example@gmail.com</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Phone number</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">098 832 8328d</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social d-flex justify-content-center">
            <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
        </div>
    </div>
</section>

<!-- Footer-->
<?php
include 'common/footer_start.php';
include 'common/footer_end.php';
?>