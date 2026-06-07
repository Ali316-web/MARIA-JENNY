<?php
include_once 'session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>login form</title>
  </head>
  <body>
    <!-- <h2>Weekly Coding Challenge #1: Sign in/up Form</h2> -->
<div class="container" id="container">
	<?php
	if (isset($_POST['success'])){
	?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		 <strong><?php echo $_SESSION['success']; ?></strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	 <?php
        unset($_SESSION['success']);
}
?>
	<div class="form-container sign-up-container">
		<form action="code.php" method="post">
    <h1>Create Account</h1>
    <span>Explores Our Vastness of Cosmetics & Jewellery</span>

    <!-- Name: only letters and spaces -->
    <input 
        type="text" 
        name="userName" 
        placeholder="Name"
        required
        pattern="[A-Za-z ]+"
        title="Name sirf alphabets aur space par mushtamil ho"
    />

    <!-- Email: valid email format -->
    <input 
        type="email" 
        name="userEmail" 
        placeholder="Email"
        required
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        title="Valid email address enter karein"
    />

    <!-- Password: letters + numbers, dot not allowed -->
    <input 
        type="password" 
        name="PASSWORD" 
        placeholder="Password"
        required
        pattern="[A-Za-z0-9]{6,}"
        title="Password minimum 6 characters, sirf letters aur numbers"
    />

    <button name="registerform">Sign Up</button>
</form>

	</div>
	<div class="form-container sign-in-container">
		<form action="code.php" method="post">
			<h1>Log in</h1>
			<br>
			
			
			<span>Explores Our Vastness of Cosmetics & Jewellery</span>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="PASSWORD" placeholder="Password" />
			<!-- <a href="#">Forgot your password?</a> -->
			<button name="loginform">Log In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome to M&J Store</h1>
				<p>Already have Account,</p>
				<button class="ghost" id="signIn">Sign In</button>
				
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Welcome back!</h1>
				<p>Dont have Account, </p>
				<button class="ghost" id="signUp">Sign Up</button>
				
			</div>
		</div>
	</div>
</div>

<!-- <footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="style.js"></script>
  </body>
</html>