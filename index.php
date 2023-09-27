<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <title>Athkam Asapuwa - Ellegance of Pottery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">

    <!--Noto Serif Sinhala-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500&display=swap" rel="stylesheet">
    <style>
        @media (width<995px) {
            #athkam{
                font-size:50px;
            }
        }
        @media (width>995px) {
            #athkam{
                font-size:150px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.php" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-6 text-white" style="font-size: 30px;">Athkam Asapuwa</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link">Products</a>
                    <?php 
                    if(isset($_SESSION['user'])){
                        if($_SESSION['user'] == 'admin'){
                        echo ("<a href='dashbord.php' class='nav-item nav-link'> Dashbord</a>");
                     }
                     else{
                        echo ("<a href='cart.php' class='nav-item nav-link'> <i class='bi bi-cart'></i> Cart</a>");
                     }
                    }
                    ?>
                    
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <?php 
                    if(isset($_SESSION['user'])){
                        echo ("<a href='logout_user.php' class='nav-item btn btn-outline-primary' style='border-radius: 20px;'>Logout </a>");
                    }
                    else{   
                        echo("<a href='sign_up.php' class='nav-item btn btn-outline-primary' style='border-radius: 20px;'>Login / Sign Up</a>");
                    }
                    

                    ?>
                    
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Athkam Asapuwa</h2>
                        <h6 class="display-1 text-white m-0" style="font-family: 'Abhaya Libre', serif;" id="athkam">අත්කම් අසපුව</h6>
                        <h3 class="text-light font-weight-lighter m-0">Ellegance In Pottery</h3>
                 
                    </div>  
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-3.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-lighter m-0">Athkam Asapuwa</h2>
                        <h6 class="display-1 text-white m-0" style="font-family: 'Abhaya Libre', serif;" id="athkam">අත්කම් අසපුව</h6>
                        <h3 class="text-light font-weight-lighter m-0">Ellegance In Pottery</h3>
     
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Healthy  & 100% Natural</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <h5 class="mb-3">We deleiver a world class products with 100% natural and healty for well-being of your life</h5>
                    <p>Athkam asapuwa provides you with a variety of diffent clay products including pots , clay bottles , "guruleththu" , clay plates , macroms , clay cups and much more</p>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p>Our vision is to minimize the use of toxic metals like aluminium & introduce our 100% natural and healthy Clay products and create a healthy lifestyle around the world</p>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>100% Non-Toxic Materials</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Natural & Healthy Products</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>100% Cost Efficient</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
                <h1 class="display-4">Exceptional Quality & Service</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-truck service-icon"></i>Sri Lankan Traditional Designs</h4>
                            <p class="m-0">Clay products has been used by man since the ancient times. 
                                We hope pass this art to our next generationr</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-coffee service-icon"></i>Variety of Ornamentals</h4>
                            <p class="m-0">We are not limited to kitchen.
                                We have ornamental products like vases , clocks , macroms all made of clay</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-award service-icon"></i>Best Quality Handmade Products</h4>
                            <p class="m-0">We've been creating our products by experts in field with the best quality out of all other</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-4.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-table service-icon"></i>Order Via Whatsapp</h4>
                            <p class="m-0">You can easily pick your choice & order it via the whatsapp platform. Your order will be at your door step in 2-Days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Offer Start -->
    <div class="offer container-fluid my-5 py-5 text-center position-relative overlay-top overlay-bottom">
        <div class="container py-5">   
            <h1 class="text-white mb-3">New Arrival</h1>
            <h1 class="display-3 text-primary mt-3">Painetd Clay Bottles</h1>
            <h4 class="text-white font-weight-normal mb-4 pb-3">Now Available At our Stores</h4>
            
        </div>
    </div>
    <!-- Offer End -->

    <!-- Packages Start -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">25% OFF</h1>
                                <h1 class="text-white">On our Kitchen Essentials Package</h1>
                            </div>
                            <p class="text-white">Our ' Kitchen Essentials ' Package includes all the essetial items you'll be needing in your kitchen at the lowest price possible. </p>
                            <p class="text-white">*Conditons Apply</p>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Includes 3XL pots & 3L pots</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>A Coconut Shell Spoon set is Free</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>All this for just 10 500 LKR</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Get Your Package Today</h1>
                            <form class="mb-5">
                                <h2 class="text-primary">Lite Package</h2>
                                <h5 class="text-white">Extra-Ordinary Value For a Low Budget</h5>
                            </form>
                            <form class="mb-5">
                                <h2 class="text-primary">Regular Package</h2>
                                <h5 class="text-white">Regular sized equipments</h5>
                            </form>
                            <form class="mb-5">
                                <h2 class="text-primary">Extreme Package</h2>
                                <h5 class="text-white">Extreme Package for Pro Kitchen  </h5>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Packages End -->


    <!-- Credits Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Credits</h4>
                <h1 class="display-4">Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-1.jpg" alt="" style="object-fit: contain;">
                        <div class="ml-3">
                            <h4>Ranjan Ranaweera</h4>
                            <i>Photographer</i>
                        </div>
                    </div>
                    <p class="m-0">" I am a photographer and I like traditional stuff very much. I've found that here they've done a pretty decent job of creating ornamental objects in clay "</p>
                    <p class="m-0"></p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-2.jpg" alt="" style="object-fit: contain;">
                        <div class="ml-3">
                            <h4>Malika Rathnayaka</h4>
                            <i>Artist</i>
                        </div>
                    </div>
                    <p class="m-0">" I'm an artist. I saw an indescribable beauty in these creations. I've bought some of them to keep at my Art gallery "</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-3.jpg" alt="" style="object-fit: contain;">
                        <div class="ml-3">
                            <h4>Dinesh Muthugala</h4>
                            <i>Biology Teacher</i>
                        </div>
                    </div>
                    <p class="m-0">" I'm a teacher in profession. But I a huge fan of traditional art and sculptures. I didn't saw any place in the whole country with such precise handmade products "</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-4.jpg" alt="" style="object-fit: contain;">
                        <div class="ml-3">
                            <h4>Sudesh Viduranga</h4>
                            <i>Entrepreneur</i>
                        </div>
                    </div>
                    <p class="m-0">" I am an entrepreneur. I usually export Sri Lankan products to other countries. I've found that, in here they make the best pottery in the world "</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Credits End -->


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Annasigala, Molagoda , Kegalle , Sri Lanka</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+94 77 453 6757</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>info.athkamasapuwa@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Join Our Official FB Page & Instergram </p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Sunday</h6>
                    <p>8.00 AM - 12.00 PM</p>
  
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Join our Newsletter program to keep in touch about our latest updates</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>