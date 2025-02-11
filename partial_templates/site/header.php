<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>I-AIHD &mdash; Initiative for the Advancement of Improved Health and Development</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


      
      
      
      <div class="bg-primary py-3 top-bar shadow d-none d-md-block">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-md-left pl-0">
              <a href="/" class=" pr-3 pl-0">Home</a>
              <a href="publications" class="p-3">Events</a>
              <a href="contact" class="p-3">Become A Volunteer</a>
            </div>
            <div class="col-md-6 text-md-right">
              <a href="#" class="p-3"><span class="icon-twitter"></span></a>
              <a href="#" class="p-3"><span class="icon-facebook"></span></a>
            </div>
          </div>
        </div>
      </div>
      <header class="site-navbar site-navbar-target bg-secondary shadow" role="banner">
          <div class="container">
              <div class="row align-items-center position-relative">
                  <div class="site-logo">
                      <a href="/" class="text-white"><img class="logo" src="images/logo.png" alt=""></a>
                  </div>

                  <nav class="site-navigation text-left ml-auto" role="navigation">
                      <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                          <li id="home"><a href="/" class="nav-link">Home</a></li>

                          <!-- About Us Dropdown -->
                          <li class="has-children" id="about">
                              <a href="about" class="nav-link">About Us</a>
                              <ul class="dropdown">
                                  <li><a href="about#vision">Vision</a></li>
                                  <li><a href="about#mission">Mission</a></li>
                                  <li><a href="about#objectives">Objectives</a></li>
                                  <li><a href="about#trustees">Board of Trustees</a></li>
                                  <li><a href="about#team">Management Team</a></li>
                                  <!-- <li><a href="about#projects">Latest Projects</a></li> -->
                              </ul>
                          </li>

                          <li id="publications"><a href="publications" class="nav-link">Publications</a></li>
                          <li id="contact"><a href="contact" class="nav-link">Contact</a></li>

                          <!-- Login/Logout links -->
                          <?php if (isset($_SESSION['user'])): ?>
                              <li id="logout"><a href="logout" class="nav-link">Logout</a></li>
                          <?php else: ?>
                              <li id="login"><a href="login" class="nav-link">Login</a></li>
                          <?php endif; ?>
                      </ul>
                  </nav>

                  <div class="ml-auto toggle-button d-inline-block d-lg-none">
                      <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white">
                          <span class="icon-menu h3 text-white"></span>
                      </a>
                  </div>
              </div>
          </div>
      </header>

