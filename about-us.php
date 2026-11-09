<!-- ========================================== -->
<!-- BAGIAN 1 dari 3: HEAD & HEADER SECTION    -->
<!-- (Copy bagian ini terlebih dahulu ke GitHub)-->
<!-- ========================================== -->

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Beauty & Career Space</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">                  
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
              <div id="logo">
                <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
              </div>
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li class="menu-active"><a href="index.php">Home</a></li>
                  <li><a href="about-us.php">About Us</a></li>
                  <li><a href="category.php">Category</a></li>
                  <li><a href="price.php">Price</a></li>
                  <li><a href="blog-home.php">Blog</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li class="menu-has-children"><a href="">Pages</a>
                    <ul>
                        <li><a href="elements.php">elements</a></li>
                        <li><a href="search.php">search</a></li>
                        <li><a href="single.php">single</a></li>
                    </ul>
                  </li>
                  <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a class="ticker-btn" href="logout.php">Logout</a></li>
                  <?php else: ?>
                    <li><a class="ticker-btn" href="register.php">Signup</a></li>
                    <li><a class="ticker-btn" href="login.php">Login</a></li>
                  <?php endif; ?>
                </ul>
              </nav><!-- #nav-menu-container -->                    
            </div>
        </div>
      </header><!-- #header -->


    <!-- start banner Area -->
    <section class="banner-area relative" id="home">    
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Hello, Beautiful!        
                    </h1>   
                    <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about-us.php"> About Us</a></p>
                </div>                                                          
            </div>
        </div>
    </section>
    <!-- End banner Area -->