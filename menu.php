<?php
session_start();
@include 'config.php';


if(isset($_POST['add_to_cart']))
{

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;


   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
   if(isset($_SESSION['user']) && $_SESSION['user'] != 'admin'){
        if(mysqli_num_rows($select_cart) > 0){
            $message[] = 'Product already added to cart';
        }
    elseif($_SESSION['user'] == 'admin'){
		header('location:menu.php');
	}
        else{
            $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
            $message[] = 'Product added to cart succesfully';
        }
   }
   else{
    header('location:login.php');
   }
}

?>

<!DOCTYPE html>
<html lang="en">

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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">

    <!--CSS for Filtering-->
    <link rel="stylesheet" href="css/cart.css">
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
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link active">Products</a>
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
    


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
            style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Products</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="index.html"
                        style="text-decoration: none;">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Products</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!--Alert Box Start-->
    <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="alert  alert-primary text-center" role="alert"><span>'.$message.'  </span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<!--Alert Box End-->

    <!-- Products Start -->

    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Pricing</h4>
                <h1 class="display-4">Our Price Rates</h1>
            </div>
            <div class="col-lg-12 col-md-10 col-sm-5">
                <div class="row align-items-center mb-5">
                    <div id="product-grid">
                        <div class="txt-heading">
                            <h1 style="text-align:'center'">Few Of Our Products</h1>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
        

<div class="container">
    <div class="row">
        <div class="col-12">



      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="container">
            <div class="row m-5">
            <div class="col-4">
                <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="rounded-lg">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h3 class=" mt-3"><?php echo $fetch_product['name']; ?></h3>
                <h5 class=" mt-3">$<?php echo $fetch_product['price']; ?>/-</h5>
                <hr class="hr hr-blurry"">
            <input type="submit" class="btn btn-primary mt-3" value="Add to cart" name="add_to_cart">
            </div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>" class="form-control">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>" class="form-control">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>" class="form-control">
            
            </div>
         </div>
      </form>

      <?php
         };
      };
      ?>



    </div>
    </div>

</div>

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
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
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
                        <input type="text" class="form-control border-light" style="padding: 25px;"
                            placeholder="Your Email">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
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
    <script src="js/cart.js"></script>
    <script src="js/script.js"></script>
</body>

</html>