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

    <!-- Start callto-action Area -->
    <section class="callto-action-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10 text-white">Find Your Dream Career Today!</h1>
                        <p class="text-white">Top companies are looking for talented people like you. Take your next step and land the job you’ve always wanted!</p>
                        <a class="primary-btn" href="#">Explore Open Roles </a>
                        <a class="primary-btn" href="#">Post a Job </a>
                    </div>
                </div>
            </div>  
        </div>  
    </section>
    <!-- End calto-action Area -->

    <!-- Start testimonial Area -->
    <section class="testimonial-area section-gap" id="review">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Sweet Stories from Job Seekers</h1>
                        <p>Happy moments from candidates who found their dream jobs through our portal 💌</p>
                    </div>
                </div>
            </div>                      
            <div class="row">
                <div class="active-review-carusel">
                    <div class="single-review">
                        <img src="img/r1.png" alt="">
                        <div class="title d-flex flex-row">
                            <h4>Clara Amanda</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>                                
                            </div>
                        </div>
                        <p>
                            Applying for jobs here was so easy and smooth! I found great listings and got hired at my dream company last week.
                        </p>
                    </div>  
                    <div class="single-review">
                        <img src="img/r2.png" alt="">
                        <div class="title d-flex flex-row">
                            <h4>Siti Rahma</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>                                
                            </div>
                        </div>
                        <p>
                            The job search filters are super helpful. The application process was seamless and directly connected me with HR!
                        </p>
                    </div>  
                    <div class="single-review">
                        <img src="img/r1.png" alt="">
                        <div class="title d-flex flex-row">
                            <h4>Jessica Tan</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>                                
                            </div>
                        </div>
                        <p>
                            Highly recommended for anyone looking for new opportunities! Perfect for fresh graduates searching for their first career step.
                        </p>
                    </div>  
                </div>
            </div>
        </div>  
    </section>
    <!-- End testimonial Area -->
    
 
    <!-- start footer Area -->      
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget">
                        <h6>Job Categories</h6>
                        <ul class="footer-nav">
                            <li><a href="#">Technology & IT</a></li>
                            <li><a href="#">Creative & Design</a></li>
                            <li><a href="#">Marketing & Media</a></li>
                            <li><a href="#">Admin & Finance</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>Get Job Updates 💌</h6>
                        <p>Receive fresh job alerts, interview tips, and career inspiration delivered straight to your inbox!</p>
                        <div id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                                <div class="form-group row" style="width: 100%">
                                    <div class="col-lg-8 col-md-12">
                                        <input name="EMAIL" placeholder="Enter your email address..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email address... '" required="" type="email">
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>
                                    </div> 
                                
                                    <div class="col-lg-4 col-md-12">
                                        <button class="nw-btn primary-btn">Subscribe 💌<span class="lnr lnr-arrow-right"></span></button>
                                    </div> 
                                </div>      
                                <div class="info"></div>
                            </form>
                        </div>      
                    </div>
                </div>
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Our Aesthetic Moments ✨</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="img/i1.jpg" alt=""></li>
                            <li><img src="img/i2.jpg" alt=""></li>
                            <li><img src="img/i3.jpg" alt=""></li>
                            <li><img src="img/i4.jpg" alt=""></li>
                            <li><img src="img/i5.jpg" alt=""></li>
                            <li><img src="img/i6.jpg" alt=""></li>
                            <li><img src="img/i7.jpg" alt=""></li>
                            <li><img src="img/i8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>                      
            </div>

            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->        

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>          
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>            
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script> 
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script> 
    <script src="js/owl.carousel.min.js"></script>          
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>            
    <script src="js/parallax.min.js"></script>      
    <script src="js/mail-script.js"></script>   
    <script src="js/main.js"></script>  
</body>
</html>	