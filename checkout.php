<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];

   $cart_query = mysqli_query($conn, "SELECT * FROM cart");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, flat, street, city, state, country, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='container-fluid'>
      <div class='row'>
      <div class='col-12'>
      <div class='order-message-container card bg-transparent border-0'>
      <div class='message-container modal-header'>
         <h3 class='text-dark'>Thank you for shopping!</h3>
         <div class='order-detail card-header m-3'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='card bg-transparent card-body'>
            <p> Your name : <span>".$name."</span> </p>
            <p> Your number : <span>".$number."</span> </p>
            <p> Your email : <span>".$email."</span> </p>
            <p> Your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country."</span> </p>
            <p> Your payment mode : <span>".$method."</span> </p>
         </div>
            <a href='menu.php' class='btn btn-primary m-3'>Continue shopping</a>
         </div>
      </div>
      </div>
      </div>

      </div>

      ";
   }

}

?>

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


<body>
<div class="container">
   <h1 class="text-center m-5 mt-5">Complete your order</h1>
   </div>
   

<div class="container d-flex justify-content-center m-5">
   <div class="row">
      <div class="col-12">

      
   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span class="product"><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>Your cart is empty!</span></div>";
      }
      ?>
      <span class="alert alert-primary"> Grand total : $<?= $grand_total; ?>/- </span>
   </div>
   </div>

   </div>
   </div>
   <div class="container">
   <div class="row">
   <div class="col-12 d-flex justify-content-center" >
      <div class="">
         <div class="inputBox mt-1">
            <span>Your name</span>
            <input type="text" placeholder="Enter your name" name="name" required class='form-control'>
         </div>
         <div class="inputBox mt-4">
            <span>Your email</span>
            <input type="email" placeholder="Enter your email" name="email" required class='form-control'>
         </div>

         <div class="inputBox mt-4">
            <span>Your Phone Number</span>
            <input type="number" placeholder="Enter your Phone Number" name="number" required class='form-control'>
         </div>

         <div class="inputBox mt-4">
            <span>Payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on devlivery</option>
               <option value="credit cart">Credit cart</option>
               <option value="paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox mt-4">
            <span>Address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required class='form-control'>
         </div>
         <div class="inputBox mt-4">
            <span>Address line 2</span>
            <input type="text" placeholder="e.g. Street name" name="street" required class='form-control'>
         </div>
         <div class="inputBox mt-4">
            <span>City</span>
            <input type="text" placeholder="e.g. Colombo" name="city" required class='form-control'>
         </div>
         <div class="inputBox mt-4">
            <span>State</span>
            <input type="text" placeholder="e.g. Piliyandala" name="state" required class='form-control'>
         </div>
         <div class="inputBox mt-4">
            <span>Country</span>
            <input type="text" placeholder="e.g. Sri Lanka" name="country" required class='form-control'>
         </div>

      </div>
      
  

   </div>
   </div>

</div>

<div class="container d-flex mt-4 mb-5 justify-content-center">
 
<input type="submit" value="Order now" name="order_btn" class="btn btn-lg btn-outline-primary">

<a href="index.php" class="btn btn-lg btn-outline-primary ml-4">Go Back</a>
</div>

    </form>

   
</body>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</html>