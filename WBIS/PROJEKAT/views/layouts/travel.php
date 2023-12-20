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
<body onLoad="window.scroll(0, 150)" data-spy="scroll" data-target=".fixed-top">

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
                <a class="nav-link page-scroll" href="/home">HOME <span class="sr-only">(current)</span></a>
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
            <?php use app\core\Application;
            use app\core\Constants;
            if(Application::$app->session->get(Constants::$USER_SESSION)) :?>
                <li class="nav-item">
                    <a class="nav-link page-scroll"><?php echo Application::$app->session->get(Constants::$USER_SESSION)?></a>
                </li>
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
            <h1>FIND  <span id="js-rotating"> YOUR NEXT JOURNEY,  YOURSELF ON A JOURNEY,  HAPPINESS</span></h1>
            {{ renderPartialView }}
            <br><br><br>
        </div>
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<!-- end of header -->

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

<?php


$success = Application::$app->session->getFlesh(Constants::$FLASH_MESSAGE_SUCCESS);

if($success !== false) {

    echo "
    
       <script>
       $(document).ready(function (){
          toastr.success('$success'); 
       });
       </script>
         ";

}
$error = Application::$app->session->getFlesh(Constants::$FLASH_MESSAGE_ERROR);

if($error !== false) {

    echo "
    
       <script>
       $(document).ready(function (){
          toastr.error('$error'); 
       });
       </script>
         ";

}
?>

</body>
</html>
