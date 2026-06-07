<?php
include_once 'session.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jewelery</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="css/about.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   
	 <style>
        
     </style>
</head>
<body>
    <!-- header code start here -->
<section id="header">
<nav class="navbar navbar-expand-lg navbar-light  border-bottom" style="background-color: var(--col_red);">
  <div class="container">
    <a class="navbar-brand fs-2 family_zaland  fw-bold" style="color: var(--bg_primary_light);" href="index.php"><i class="bi-gem me-1" style="color:var(--secondry) ;"></i> MARIA & JENNY</a>

    <div class="offcanvas offcanvas-start offcanvas-lg" tabindex="-1" id="mainMenu">
      <div class="offcanvas-header d-lg-none">
        <h5 class="offcanvas-title"><a class="navbar-brand fs-2 family_zaland col_red fw-bold" href="index.php"><i class="bi-gem me-1 col_secondry"></i>MARIA & JENNY</a></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item"><a class="nav-link active text_big home_link" href="index.php"><i class="bi bi-house"></i></a></li>
		  
		    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
			
			 
		  
		         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
              Products <i class="bi bi-chevron-down dropdown-arrow"></i>
            </a>
            <ul class="dropdown-menu drop_1">
              <li><a class="dropdown-item" href="all_products.php">Products</a></li>

              <!-- SEO Nested Mega Menu -->
              <!-- <li><a class="dropdown-item" href="sub_category.php">Product Details</a></li> -->
			  
			    <li><a class="dropdown-item" href="cart.php">Shopping Cart</a></li>
				
				  <li><a class="dropdown-item" href="checkout.php">Checkout</a></li>

            </ul>
          </li>


          <!-- Services -->
          <li>           
          <a class="nav-link dropdown-toggle" href="contact.php" >
            Contact Us 
            </a>
          </li>

          
<!-- php code start -->
							 <?php 
               if(isset($_SESSION['userId'])){
                ?>
                <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
                <?php

               }else{
                ?>
                <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
                <?php
               }
               ?>
        
							 <!-- php code end -->
						<!-- Products Full Mega Menu -->
        </ul>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-end">
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav nav-icons d-flex flex-row ms-2"> -->
        <!-- Search icon opens modal -->
        <!-- <li class="nav-item">
          <a class="nav-link text_big" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="bi bi-search"></i>
          </a>
        </li> -->
        <!-- <li class="nav-item"><a class="nav-link text_big" href="#"><i class="bi bi-person"></i></a></li> -->
        <!-- Cart icon opens offcanvas -->
        <!-- <li class="nav-item"> 
        <a class="nav-link position-relative text_big" data-bs-toggle="offcanvas" href="#cartOffcanvas"> 
            <i class="bi bi-cart"></i> 
            <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger cart-count font_13">0</span>
          </a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
</section>
<!-- header code end here -->