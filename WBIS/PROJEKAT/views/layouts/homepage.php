<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Nećaci</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="../assets/css-2/bootstrap.css" rel="stylesheet">
    <link href="../assets/css-2/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css-2/swiper.css" rel="stylesheet">
    <link href="../assets/css-2/magnific-popup.css" rel="stylesheet">
    <link href="../assets/css-2/styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="../assets/js/plugins/toastr/toastr.min.js"></script>

</head>
<body data-spy="scroll" data-target=".fixed-top">

<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->


<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
    <a class="navbar-brand logo-text page-scroll" href="/home">Nećaci</a>


    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>
    <!-- end of mobile menu toggle button -->

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a href="/countries" class="nav-link page-scroll">OFFERS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#callMe">CALL ME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">CONTACT</a>
            </li>
        </ul>
        <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="#your-link">
                        <span class="hexagon"></span>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="#your-link">
                        <span class="hexagon"></span>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        <ul class="navbar-nav ml-auto">
            <?php
            use app\core\Application;
            use app\core\Constants;
            if(Application::$app->session->get(Constants::$USER_SESSION)) :?>
                <li class="nav-item">
                    <a class="nav-link page-scroll"><?php echo Application::$app->session->get(Constants::$USER_SESSION)?></a>
                </li>
                <?php
                if(Application::$app->session->get(Constants::$ROLE_SESSION)[0] === "Admin") :?>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="/administration">Dashboard</a>
                    </li>
                <?php endif;?>
                <li class="nav-item">
                    <a href="/logout" class="nav-link page-scroll">Logout</a>
                </li>
            <?php else:?>
                <li class="nav-item">
                    <a href="/login" class="nav-link page-scroll">Sign in</a>
                </li>
                <li class="nav-item">
                    <a href="/registration" class="nav-link page-scroll">Sign up</a>
                </li>
            <?php endif;?>
        </ul>
    </div>
</nav> <!-- end of navbar -->
<!-- end of navbar -->


<!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <br><br><br><br>
                        <h1>FIND  <span id="js-rotating"> YOUR NEXT JOURNEY,  YOURSELF ON A JOURNEY,  HAPPINESS</span></h1>
                        <p class="p-heading p-large">“Travel is the main thing you purchase that makes you more extravagant”. We, at ‘Nećaci’, swear by this and put stock in satisfying travel dreams that make you perpetually rich constantly.</p>
                        <a class="btn-solid-lg page-scroll" href="/countries">DISCOVER</a>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->



<!-- Call Me -->
<div id="callMe" class="form-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <div class="section-title">CALL ME</div>
                    <h2 class="white">Have Us Contact You By Filling And Submitting The Form</h2>
                    <p class="white">You are just a few steps away from booking a trip. Just fill in the form and send it to us and we'll get right back.</p>
                    <ul class="list-unstyled li-space-lg white">
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">It's very easy just fill in the form</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Don't hesitate to email us for any questions or inquiries</div>
                        </li>
                    </ul>
                </div>
            </div> <!-- end of col -->
            <div class="col-lg-6">

                <!-- Call Me Form -->
                <form action="/reservationProcess" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="lname" name="name" required>
                        <label class="label-control" for="lname">Name</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="lsurname" name="surname" required>
                        <label class="label-control" for="lsurname">Surname</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control-input" id="lemail" name="email" required>
                        <label class="label-control" for="lemail">Email</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="lphone" name="phone_number" required>
                        <label class="label-control" for="lphone">Phone</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control-select" name="accomodation_id" id="accommodation_id" required>
<!--                        --><?php
                            $hotels = new \app\models\AccommodationModel();
                            $accommodations= $hotels->getHotelsid();

                            ?>
                            <?php if(isset($_GET['id'])) :?>
                                <option class="select-option" value="<?php echo $_GET["id"]?>"><?php echo $_GET['name']." | ". $_GET["price"].'€ per night'?></option>
                            <?php endif;?>
                        <?php for($i = 0; $i < count($accommodations); $i++) : ?>
                            <option class="select-option" value="<?php echo $accommodations[$i]["id"]?>"><?php echo $accommodations[$i]['accommodation_name']." | ". $accommodations[$i]["price_per_night"].'€ per night'?></option>
                            <?php continue;?>
                            <?php endfor;?>
                        </select>
                        <div class="form-group">
                            <br>
                            <input type="date" class="form-control-input" id="check_in" name="check_in" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control-input" id="check_out" name="check_out" required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <?php if(Application::$app->session->get(Constants::$USER_SESSION)) :?>
                        <button type="submit" class="form-control-submit-button">MAKE YOUR RESERVATION</button>
                    <?php else:?>
                        <div class="alert alert-danger">You must login to make your reservation<a href="/login"> click here</a></div>
                    <?php endif;?>


                    <div class="form-message">
                        <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </form>
                <!-- end of call me form -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-1 -->
<!-- end of call me -->

<!-- Contact -->
<div id="contact" class="form-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <div class="section-title">CONTACT</div>
                    <h2>Get In Touch Using The Form</h2>
                    <p>You can stop by our office for a cup of coffee and just use the contact form below for any questions and inquiries</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address"><i class="fas fa-map-marker-alt"></i>Terazije 25, Belgrade</li>
                        <li><i class="fas fa-phone"></i><a href="tel:003024630820">+062-811-98-62</a></li>
                        <li><i class="fas fa-phone"></i><a href="tel:003024630820">+062-811-98-63</a></li>
                        <li><i class="fas fa-envelope"></i><a href="mailto:office@aria.com">office@necak.com</a></li>
                    </ul>
                    <h3>Follow Nećak On Social Media</h3>

                    <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-pinterest fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <span class="hexagon"></span>
                                <i class="fab fa-behance fa-stack-1x"></i>
                            </a>
                        </span>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">

                <!-- Contact Form -->
                <form action="/contactProcess" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control-input" name="user_name" id="cname" required>
                        <label class="label-control" for="cname">Name</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control-input" name="user_email" id="cemail" required>
                        <label class="label-control" for="cemail">Email</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control-textarea" name="user_message" id="cmessage" required></textarea>
                        <label class="label-control" for="cmessage">Your message</label>
                        <div class="help-block with-errors"></div>
                    </div>
                        <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                    <div class="form-message">
                        <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </form>
                <!-- end of contact form -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-2 -->
<!-- end of contact -->


<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-container about">
                    <h4>Few Words About Aria</h4>
                    <p class="white">We're passionate about delivering the best travel services.</p>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-md-2">
                <div class="text-container">
                    <h4>Links</h4>
                    <ul class="list-unstyled li-space-lg white">
                        <li>
                            <a class="white" href="terms-conditions.html">Terms & Conditions</a>
                        </li>
                        <li>
                            <a class="white" href="privacy-policy.html">Privacy Policy</a>
                        </li>
                    </ul>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of footer -->
<!-- end of footer -->


<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">Template by Inovatik</a></p>
            </div> <!-- end of col -->
        </div> <!-- enf of row -->
    </div> <!-- end of container -->
</div> <!-- end of copyright -->
<!-- end of copyright -->


<!-- Scripts -->
<script src="../assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="../assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="../assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="../assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="../assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="../assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="../assets/js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
<script src="../assets/js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
<script src="../assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="../assets/js/scripts.js"></script> <!-- Custom scripts -->


</body>
</html>

