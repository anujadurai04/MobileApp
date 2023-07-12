<?php include '../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- Head Start -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name=viewport content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta name="description" content="JD Mobile Spares" />
  <meta name="keywords" content="JD Mobile Spares" />
  <meta name="author" content="JD Mobile Spares" />
  <link rel="manifest" href="../../../manifest.json" />
  <title>JD Mobile Spares</title>
  <link rel="icon" href="../../../assets/images/favicon.png" type="image/x-icon" />
  <link rel="apple-touch-icon" href="../../../assets/images/favicon.png" />
  <meta name="theme-color" content="#0baf9a" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="JD Mobile Spares" />
  <meta name="msapplication-TileImage" content="../../../assets/images/favicon.png" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" id="rtl-link" type="text/css" href="../../../assets/css/vendors/bootstrap.css" />

  <!-- Iconly Icon css -->
  <link rel="stylesheet" type="text/css" href="../../../assets/css/iconly.css" />

  <!-- Pricing Slider css -->
  <link rel="stylesheet" type="text/css" href="../../../assets/css/pricing-slider.css" />

  <!-- Slick css -->
  <link rel="stylesheet" type="text/css" href="../../../assets/css/vendors/slick.css" />
  <link rel="stylesheet" type="text/css" href="../../../assets/css/vendors/slick-theme.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


  <!-- Style css -->
  <link rel="stylesheet" id="change-link" type="text/css" href="../../../assets/css/style.css" />
</head>
<!-- Head End -->
<!-- Body Start -->

<body>
  <!-- Header Start -->
  <header class="header">
    <div class="logo-wrap">
      <i class="fas fa-bars nav-bar"></i>
      <a href="../home/"> <img class="logo logo-w" src="../../../assets/images/logo/logo.png" alt="logo" /></a>
      <a href="../home/"> <img class="logo" src="../../../assets/images/logo/logo.png" alt="logo" /></a>
    </div>
    <div class="avatar-wrap">
      <a href="../settings/">
        <img id="loginavatar" src="" class="avatar" alt="avatar" />
      </a>
    </div>
  </header>
  <!-- Header End -->

  <!-- Sidebar Start -->
  <a href="javascript:void(0)" class="overlay-sidebar"></a>
  <aside class="header-sidebar">
    <div class="wrap">
      <div class="user-panel">
        <div class="media">
          <a href="#"> <img id="menuProfilepic" src="" class="avatar" alt="avatar" /></a>
          <div class="media-body">
            <a href="#" class="title-color font-sm"><span id="menuname"></span>
              <span class="content-color font-xs" id="menuphone"></span>
            </a>
          </div>
        </div>
      </div>

      <!-- Navigation Start -->
      <nav class="navigation">
        <ul>
          <li>
            <a href="../home/" class="nav-link title-color font-sm">
              <i class="iconly-Home icli"></i>
              <span>Home</span>
            </a>
            <a class="arrow" href="../home/"><i data-feather="chevron-right"></i></a>
          </li>
          <!-- 
            <li>
              <a href="pages-list.html" class="nav-link title-color font-sm">
                <i class="iconly-Paper icli"></i>
                <span>Fastkart Pages list</span>
              </a>
              <a class="arrow" href="pages-list.html"><i data-feather="chevron-right"></i></a>
            </li> -->

          <li>
            <a href="../shop/" class="nav-link title-color font-sm">
              <i class="iconly-Category icli"></i>
              <span>Shop by Category</span>
            </a>
            <a class="arrow" href="../shop/"><i data-feather="chevron-right"></i></a>
          </li>

          <li>
            <a href="../orders/" class="nav-link title-color font-sm">
              <i class="iconly-Document icli"></i>
              <span>Orders</span>
            </a>
            <a class="arrow" href="../orders/"><i data-feather="chevron-right"></i></a>
          </li>

          <!-- <li>
              <a href="wishlist.html" class="nav-link title-color font-sm">
                <i class="iconly-Heart icli"></i>
                <span>Your Wishlist</span>
              </a>
              <a class="arrow" href="wishlist.html"><i data-feather="chevron-right"></i></a>
            </li> -->

          <!-- <li>
              <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#language" aria-controls="language" class="nav-link title-color font-sm">
                <img src="../../../assets/icons/png/flags.png" alt="flag" />
                <span>Langauge</span>
              </a>
              <a class="arrow" href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="account.html" class="nav-link title-color font-sm">
                <i class="iconly-Add-User icli"></i>
                <span>Your Account</span>
              </a>
              <a class="arrow" href="account.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="notification.html" class="nav-link title-color font-sm">
                <i class="iconly-Notification icli"></i>
                <span>Notification</span>
              </a>
              <a class="arrow" href="notification.html"><i data-feather="chevron-right"></i></a>
            </li> -->

          <li>
            <a href="../settings/" class="nav-link title-color font-sm">
              <i class="iconly-Setting icli"></i>
              <span>Settings</span>
            </a>
            <a class="arrow" href="../settings/"><i data-feather="chevron-right"></i></a>
          </li>

          <!-- <li>
              <a href="javascript:void(0)" class="nav-link title-color font-sm">
                <i class="iconly-Graph icli"></i>
                <span>Dark</span>
              </a>

              <div class="dark-switch">
                <input id="darkButton" type="checkbox" />
                <span></span>
              </div>
            </li> -->
          <!-- 
            <li>
              <a href="javascript:void(0)" class="nav-link title-color font-sm">
                <i class="iconly-Filter icli"></i>
                <span>RTL</span>
              </a>

              <div class="dark-switch">
                <input id="rtlButton" type="checkbox" />
                <span class="before-none"></span>
              </div>
            </li> -->
        </ul>
      </nav>
      <!-- Navigation End -->
    </div>

    <div class="contact-us">
      <span class="title-color">Contact Support</span>
      <p class="content-color font-xs">If you have any problems, queries, or questions, feel free to reach out.</p>
      <a href="https://api.whatsapp.com/send?phone=919876543210&text=Hello,%20I%20have%20a%20question%20about%20your%20product." target="_blank" class="btn-solid">Contact Us</a>
    </div>
  </aside>
  <!-- Sidebar End -->