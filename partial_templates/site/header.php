<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>I-AIHD &mdash; Initiative for the Advancement of Improved Health and Development</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/685ffd6171d548190fd2c549/1iurfbhpj';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
    </script>
    <!--End of Tawk.to Script-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">



    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <style>
      .icon-circle {
        width: 60px;
        height: 60px;
        background-color: #007bff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .icon-circle:before {
          content: "\f111";
          display: none
      }
    </style>


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


      
      
      
      <!-- <div class="bg-primary py-3 top-bar shadow d-none d-md-block">
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
      </div> -->
      <header class="site-navbar site-navbar-target bg-secondary shadow" role="banner">
          <div class="container">
              <div class="row align-items-center position-relative">
                  <div class="site-logo">
                      <a href="/" class="text-white"><img class="logo" src="images/logo.png" alt=""></a>
                  </div>

                  <nav class="site-navigation text-left ml-auto" role="navigation">
                      <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                          <!-- About Us Dropdown -->
                          <li class="has-children" id="about">
                              <a href="/" class="nav-link">Home</a>
                              <ul class="dropdown">
                                  <li><a href="/#what-we-do">What We Do</a></li>
                                  <li><a href="/#our-partners">Our Partners</a></li>
                                  <li><a href="/#latest-publications">Latest Publications</a></li>
                                  <li><a href="/#donate">Donation</a></li>
                                  <!-- <li><a href="about#projects">Latest Projects</a></li> -->
                              </ul>
                          </li>

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

