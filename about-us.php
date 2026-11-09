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

    <!-- Start service Area -->
    <section class="service-area section-gap" id="service">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 pb-40 header-text">
                    <h1>Why You'll Love Us</h1>
                    <p>
                        Dibuat khusus untuk mendukung perjalanan karier impianmu dengan penuh cinta ✨
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-user"></span>Expert Mentors</h4>
                        <p>
                            Bimbingan profesional yang siap bantu kamu kembangkan skill dan potensi terbaikmu.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-license"></span>Friendly Community</h4>
                        <p>
                            Lingkungan belajar dan bekerja yang hangat, suportif, serta menyenangkan.
                        </p>                                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-phone"></span>24/7 Support</h4>
                        <p>
                            Tim kami selalu ada untuk membantumu kapan pun kamu membutuhkan arahan.
                        </p>                                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-rocket"></span>Career Growth</h4>
                        <p>
                            Tingkatkan rasa percaya diri dan wawasanmu untuk meraih karier impian.
                        </p>                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-diamond"></span>Loved by Thousands</h4>
                        <p>
                            Telah dipercaya oleh ribuan wanita hebat untuk berkembang bersama.
                        </p>                                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-bubble"></span>Sweet Feedback</h4>
                        <p>
                            Kisah sukses dan ulasan manis dari member yang telah berproses bersama kami.
                        </p>                                    
                    </div>
                </div>                      
            </div>
        </div>  
    </section>
    <!-- End service Area -->                      

    <!-- Start feature Area -->
    <section class="feature-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-3 feat-img no-padding">
                    <img class="img-fluid" src="img/pages/f1.jpg" alt="">
                </div>
                <div class="col-lg-3 no-padding feat-txt">
                    <h6 class="text-uppercase text-white">GLOW UP YOUR CAREER</h6>
                    <h1>Siapa Kami?</h1>
                    <p>
                        Ruang aman dan kreatif tempat kamu bisa menemukan passion, mengasah bakat, dan bersinar di dunia kerja.
                    </p>
                </div>
                <div class="col-lg-3 feat-img no-padding">
                    <img class="img-fluid" src="img/pages/f2.jpg" alt="">                           
                </div>
                <div class="col-lg-3 no-padding feat-txt">
                    <h6 class="text-uppercase text-white">CREATING OPPORTUNITIES</h6>
                    <h1>Peran Kami</h1>
                    <p>
                        Menghubungkan kamu dengan peluang kerja terbaik serta memberikan tempat untuk terus bertumbuh.
                    </p>
                </div>
            </div>
        </div>  
    </section>
    <!-- End feature Area -->

    <!-- Start team Area -->
    <section class="team-area section-gap" id="team">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Meet Our Lovely Mentors</h1>
                        <p>Para wanita hebat dan profesional yang siap mendampingi langkahmu 💕</p>
                    </div>
                </div>
            </div>                      
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-md-3 single-team">
                    <div class="thumb">
                        <img class="img-fluid" src="img/pages/t1.jpg" alt="">
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="meta-text mt-30 text-center">
                        <h4>Ethel Davis</h4>
                        <p>Chief Happiness Officer</p>                                            
                    </div>
                </div>
                <div class="col-md-3 single-team">
                    <div class="thumb">
                        <img class="img-fluid" src="img/pages/t2.jpg" alt="">
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="meta-text mt-30 text-center">
                        <h4>Rodney Cooper</h4>
                        <p>Creative & Aesthetic Lead</p>                  
                    </div>
                </div>  
                <div class="col-md-3 single-team">
                    <div class="thumb">
                        <img class="img-fluid" src="img/pages/t3.jpg" alt="">
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="meta-text mt-30 text-center">
                        <h4>Dora Walker</h4>
                        <p>Head of Tech & Growth</p>                    
                    </div>
                </div>  
                <div class="col-md-3 single-team">
                    <div class="thumb">
                        <img class="img-fluid" src="img/pages/t4.jpg" alt="">
                        <div class="align-items-center justify-content-center d-flex">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="meta-text mt-30 text-center">
                        <h4>Lena Keller</h4>
                        <p>Social Media & Content Stylist</p>                    
                    </div>
                </div>                                                                                                                
            </div>
        </div>  
    </section>
    <!-- End team Area -->