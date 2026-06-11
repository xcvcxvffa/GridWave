<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2026/landspire-php/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jun 2026 09:24:13 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <title>Landspire - Gardening and Landscaping PHP Template - Home One</title>
  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="page-wrapper">

    <!-- Preloader Start -->
    <div class="preloader"></div>

    <!-- Back To Top Start -->
    <button id="back-top" class="back-to-top">
      <i class="fa-regular fa-arrow-up"></i>
    </button>

    <!-- MouseCursor Start -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"></div>

    <!-- Main Header-->
    <header class="main-header header-style-one header-1">
      <!-- Header Lower -->
      <div class="header-lower">
        <!-- Main box -->
        <div class="main-box">
          <div class="logo">
            <a href="index.php"><img src="images/logo/black-logo.png" alt=""></a>
          </div>
          <!--Nav Box-->
          <div class="nav-outer">
            <nav class="nav main-menu mx-auto">
              <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
              <ul class="navigation">
                <li class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'current' : ''; ?>">
                  <a href="index.php">Home</a>
                </li>
                <li class="<?php echo ($current_page == 'about.php') ? 'current' : ''; ?>">
                  <a href="about.php">About Us</a>
                </li>
                <?php $service_pages = ['services.php', 'utility-scale-solar.php', 'utility-scale-wind.php', 'hybrid-power-plant.php', 'power-transmission.php', 'power-distribution.php', 'underground-cable-work.php', 'electrical-substations.php', 'operations-maintenance.php']; ?>
                <li class="dropdown <?php echo (in_array($current_page, $service_pages)) ? 'current' : ''; ?>">
                  <a href="services.php">Service</a>
                  <ul>
                    <li><a href="utility-scale-solar.php">Utility Scale Solar</a></li>
                    <li><a href="utility-scale-wind.php">Utility Scale Wind</a></li>
                    <li><a href="hybrid-power-plant.php">Hybrid Power Plant</a></li>
                    <li><a href="power-transmission.php">Power Transmission</a></li>
                    <li><a href="power-distribution.php">Power Distribution</a></li>
                    <li><a href="underground-cable-work.php">Underground Cable Work</a></li>
                    <li><a href="electrical-substations.php">Electrical Substations</a></li>
                    <li><a href="operations-maintenance.php">Operations & Maintenance</a></li>
                  </ul>
                </li>
                <?php $sustainability_pages = ['green-ppa.php', 'green-credits.php']; ?>
                <li class="dropdown <?php echo (in_array($current_page, $sustainability_pages)) ? 'current' : ''; ?>">
                  <a href="#">Sustainability</a>
                  <ul>
                    <li><a href="green-ppa.php">Green PPA</a></li>
                    <li><a href="green-credits.php">Green Credits</a></li>
                  </ul>
                </li>
                <li class="<?php echo ($current_page == 'project.php') ? 'current' : ''; ?>">
                  <a href="project.php">Our Work</a>
                </li>
                <li class="<?php echo ($current_page == 'news-grid.php') ? 'current' : ''; ?>">
                  <a href="news-grid.php">Blog</a>
                </li>
                <li class="<?php echo ($current_page == 'contact.php') ? 'current' : ''; ?>">
                  <a href="contact.php">Contact Us</a>
                </li>
              </ul>
            </nav>

            <div class="outer-box">
              <!-- Main Menu End-->
              <div class="ui-btn-outer">
                <a class="theme-btn-main" href="upload/GRIDWAVE COMPANY PROFILE-2026.pdf" target="_blank">
                  <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-right"></i> </span>
                  <span class="theme-btn">Get Company Profile</span>
                  <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-right"></i> </span>
                </a>
                <!-- Mobile Nav toggler -->
              </div>
              <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Header Lower -->

      <!-- Mobile Menu  -->
      <div class="mobile-menu">
        <div class="menu-backdrop"></div>

        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
          <div class="upper-box">
            <div class="nav-logo">
              <a href="index.php"><img src="images/logo/white-logo.png" alt=""></a>
            </div>
            <div class="close-btn"><i class="icon fa fa-times"></i></div>
          </div>

          <ul class="navigation clearfix">
            <!--Keep This Empty / Menu will come through Javascript-->
          </ul>
          
          <!-- Mobile Get Company Profile Button -->
          <div class="mobile-menu-btn" style="padding: 20px 25px;">
            <a class="theme-btn-main" href="upload/GRIDWAVE COMPANY PROFILE-2026.pdf" target="_blank" style="width: 100%; justify-content: center;">
              <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-right"></i> </span>
              <span class="theme-btn">Get Company Profile</span>
              <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-right"></i> </span>
            </a>
          </div>

          <ul class="contact-list-one">
            <li>
              <!-- Contact Info Box -->
              <div class="contact-info-box">
                <i class="icon lnr-icon-phone-handset"></i>
                <span class="title">Call Now</span>
                <a href="tel:+92880098670">+92 (8800) - 98670</a>
              </div>
            </li>
            <li>
              <!-- Contact Info Box -->
              <div class="contact-info-box">
                <span class="icon lnr-icon-envelope1"></span>
                <span class="title">Send Email</span>
                <a href="mailto:help@company.com">help@company.com</a>
              </div>
            </li>
            <li>
              <!-- Contact Info Box -->
              <div class="contact-info-box">
                <span class="icon lnr-icon-clock"></span>
                <span class="title">Send Email</span>
                Mon - Sat 8:00 - 6:30, Sunday - CLOSED
              </div>
            </li>
          </ul>
          <ul class="social-links">
            <li><a href="https://www.linkedin.com/company/gridwave-energy-pvt-ltd/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="https://www.instagram.com/gridwaveenergy/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.facebook.com/profile.php?id=61587716416774" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
          </ul>
        </nav>
      </div>
      <!-- End Mobile Menu -->

      <!-- Sticky Header  -->
      <div class="sticky-header">
        <div class="auto-container">
          <div class="inner-container">
            <!--Logo-->
            <div class="logo">
              <a href="index.php"><img src="images/logo/black-logo.png" alt="img"></a>
            </div>

            <!--Right Col-->
            <div class="nav-outer">
              <!-- Main Menu -->
              <nav class="main-menu">
                <div class="navbar-collapse show collapse clearfix">
                  <ul class="navigation clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                  </ul>
                </div>
              </nav>
              <!-- Main Menu End-->
            </div>

            <div class="outer-box">
              <div class="ui-btn-outer">
                <a class="theme-btn-main" href="upload/GRIDWAVE COMPANY PROFILE-2026.pdf" target="_blank">
                  <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-right"></i> </span>
                  <span class="theme-btn">Get Company Profile</span>
                  <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-right"></i> </span>
                </a>
              </div>
              <!--Mobile Navigation Toggler-->
              <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Sticky Menu -->
    </header>
    <!--End Main Header -->

