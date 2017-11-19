<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#fcbb1c">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#fcbb1c">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#fcbb1c">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">


    <link rel="stylesheet" href="<?=base_url('assets/styles/style.css')?>" type="text/css" />

    <link rel="shortcut icon" href="<?=base_url('assets/images/logo.png')?>">
    
    <!-- Scripts -->
    <script src="<?=base_url('assets/js/jquery-3.2.1.min.js')?>" type="text/javascript"></script>


    <script src="<?=base_url('assets/js/TweenMax.min.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/js/ScrollMagic.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/js/animation.gsap.js')?>" type="text/javascript"></script>
    
    <script src="<?=base_url('assets/js/rating.js')?>"></script>
    <script src="<?=base_url('assets/js/script.js')?>"></script>

    <title>Via Emmaus Tours</title>
    <meta name="description" content=" ">
    <meta name="keywords" content="">
    <script>
        var base="<?=base_url()?>";
    </script>

</head>

<body class="<?php if(current_url() != base_url('/')){ echo"not-home"; } ?>">
<div class="header">
    <div class="side-menu">
        <ul>
            <li class="language-li">
                <a href="#">
                    <span class="language">ESP</span>
                </a>
            </li>
            <li>
                <a class="menu-open" href="#">
                    <img src="<?=base_url('assets/images/menu-icon.png')?>">
                    <span>Menu</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/')?>">
                    <img src="<?=base_url('assets/images/home-icon.png')?>">
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/about')?>">
                    <img src="<?=base_url('assets/images/about-icon.png')?>">
                    <span>About Us</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/itineraries')?>">
                    <img src="<?=base_url('assets/images/tours-icon.png')?>">
                    <span>Itineraries</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/services')?>">
                    <img src="<?=base_url('assets/images/services-icon.png')?>">
                     <span>Services</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/gallery')?>">
                    <img src="<?=base_url('assets/images/gallery-icon.png')?>">
                    <span>Gallery</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/rating')?>">
                    <img src="<?=base_url('assets/images/reviews-icon.png')?>">
                    <span>Reviews</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/contact')?>">
                    <img src="<?=base_url('assets/images/contact-icon.png')?>">
                    <span>Contact Us</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/privacy')?>">
                    <img src="<?=base_url('assets/images/privacy-icon.png')?>">
                    <span>Privacy Policy</span>
                </a>
            </li>

            <li>
                <a href="<?=base_url('/front/terms')?>">
                    <img src="<?=base_url('assets/images/terms-icon.png')?>">
                    <span>Terms Of Use</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="logo-space">
        <a href="<?=base_url('/')?>">
            <img src="<?=base_url('assets/images/logo.png')?>">
        </a>
    </div>


    <div class="weather-info">
        <span><img src="<?=base_url('assets/images/weather.png')?>"> Sky is clear 25°</span>
        <span class="top-15"><img src="<?=base_url('assets/images/time-head.png')?>"> 2:49 PM (GMT+3)</span>
    </div>

</div>
