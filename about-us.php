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
    <title>CareerSpace - Find Your Next Job</title>

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
                <li><a href="category.php">Categories</a></li>
                <li><a href="price.php">Pricing</a></li>
                <li><a href="blog-home.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li class="menu-has-children"><a href="">Pages</a>
                    <ul>
                        <li><a href="elements.php">Elements</a></li>
                        <li><a href="search.php">Search Jobs</a></li>
                        <li><a href="single.php">Job Details</a></li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a class="ticker-btn" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a class="ticker-btn" href="register.php">Sign Up</a></li>
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
                        Empowering Your Career Journey        
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
                    <h1>Why Choose Our Job Portal</h1>
                    <p>
                        Designed specifically to connect ambitious talent with top employers across industries.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-user"></span>Verified Employers</h4>
                        <p>
                            Connect with trusted hiring managers and reputed companies actively seeking top talent.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-license"></span>Smart Matching</h4>
                        <p>
                            Discover job opportunities tailored precisely to your skillset, experience, and goals.
                        </p>                                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-phone"></span>Career Support</h4>
                        <p>
                            Get guidance, application assistance, and resources whenever you need a boost.
                        </p>                                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-rocket"></span>Fast Application</h4>
                        <p>
                            Apply to multiple open roles seamlessly with a single click and streamlined profile.
                        </p>                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-diamond"></span>Trusted Nationwide</h4>
                        <p>
                            Relied upon by thousands of job seekers and recruitment teams to build great careers.
                        </p>                                
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <h4><span class="lnr lnr-bubble"></span>Verified Reviews</h4>
                        <p>
                            Real success stories and transparent feedback from candidates hired through our platform.
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
                    <h6 class="text-uppercase text-white">ACCELERATE YOUR CAREER</h6>
                    <h1>Who We Are</h1>
                    <p>
                        A dedicated platform built to help candidates discover meaningful roles, build skills, and stand out in today's competitive job market.
                    </p>
                </div>
                <div class="col-lg-3 feat-img no-padding">
                    <img class="img-fluid" src="img/pages/f2.jpg" alt="">                           
                </div>
                <div class="col-lg-3 no-padding feat-txt">
                    <h6 class="text-uppercase text-white">CONNECTING TALENT & OPPORTUNITY</h6>
                    <h1>Our Mission</h1>
                    <p>
                        Bridging the gap between talented professionals and hiring companies, making career growth accessible to everyone.
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
                        <h1 class="mb-10">Meet Our Talent Specialists</h1>
                        <p>Dedicated recruitment and career experts here to guide your professional journey</p>
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
                        <p>Head of Talent Acquisition</p>                                            
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
                        <p>Senior Career Consultant</p>                  
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
                        <p>Tech & Growth Advisor</p>                    
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
                        <p>Employer Relations Lead</p>                    
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
                        <h1 class="mb-10 text-white">Find Your Next Opportunity Today!</h1>
                        <p class="text-white">Top companies are actively hiring talent like you. Take the next step in your career path!</p>
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
                        <h1 class="mb-10">Success Stories from Job Seekers</h1>
                        <p>Hear from candidates who successfully landed their dream roles through our platform</p>
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
                            Applying for jobs here was fast and seamless! I filtered through relevant listings and got hired by a top tech company within a week.
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
                            The search filters are powerful and accurate. The application process directly connected me with HR managers without any delays.
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
                            Highly recommended for fresh graduates and experienced professionals alike looking to take the next major leap in their careers!
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
                            <li><a href="#">Finance & Admin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>Get Job Alerts</h6>
                        <p>Receive fresh job vacancies, interview tips, and market insights delivered straight to your inbox!</p>
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
                                        <button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
                                    </div> 
                                </div>      
                                <div class="info"></div>
                            </form>
                        </div>      
                    </div>
                </div>
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Workplace Highlights</h6>
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