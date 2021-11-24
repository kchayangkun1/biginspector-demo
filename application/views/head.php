<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>32 Decoe</title>
<meta name="title" content="32 Decoe">
<meta name="description" content="32 Decoe">
<meta name="keyword" content="32 Decoe">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:title" content="32 Decoe">
<meta property="og:description" content="32 Decoe">
<meta property="og:image" content="<?=base_url('assets/img/banner/banner.png');?>">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="">
<meta property="twitter:title" content="32 Decoe">
<meta property="twitter:description" content="32 Decoe">
<meta property="twitter:image" content="<?=base_url('assets/img/banner/banner.png');?>">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/vendor/bootstrap-4.6.0-dist/bootstrap-4.6.0-dist/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/glightbox/css/glightbox.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/swiper/swiper-bundle.min.css');?>" rel="stylesheet">

  <link href="<?=base_url('assets/lib/aos/aos.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/lib/animate/animate.min.css');?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="@import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;1,100&display=swap');">
  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">

<style>
  body{
    overflow-x: hidden;
  }  
</style>
</head>
<section class=" d-none  d-md-none d-lg-block d-xl-block">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #dad0c5; height: 12%;box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);">
      <a id="brand_img" href="<?=base_url('home');?>">
        <img src="<?=base_url('assets/img/logo/logo1.png');?>" id="imglogo" class="img-logo" />
      </a>
      <div class="collapse navbar-collapse w-100" id="navbarCollapse">
        <ul class="navbar-nav mr-auto ml-auto">
          <li class="nav-item menu-active">
          <li class="menu-active">
            <a  class="nav-link"  href="<?=base_url('home');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('#');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">ABOUT</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('article');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">ARTICLE</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('galley');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">GALLERY</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('contact');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">CONTACT</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</section>

<section class=" d-block  d-md-block d-lg-none d-xl-none">
<ul class="nav justify-content-center " style="background-color: #dad0c5; margin-top: -18%;">
  <li class="nav-item w-100" align="center">
    <a class="nav-link" href="<?=base_url('home');?>">
    <img id="logo-head" src="<?=base_url('assets/img/logo/logo1.png');?>" alt="" class="p-3" align="center">
    </a>

  </li>
  <li class="menu-active">
            <a  class="nav-link"  href="<?=base_url('home');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('#');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">ABOUT</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('#');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">ARTICLE</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('galley');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">GALLERY</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link" href="<?=base_url('contact');?>"  style="color: #000000;  font-family: 'airstrikebold.ttf';">CONTACT</a>
          </li>
</ul>
</section>