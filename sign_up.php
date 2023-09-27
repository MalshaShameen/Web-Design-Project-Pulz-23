<!DOCTYPE html>
<?php 
//starting the session
session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Athkam Asapuwa - Ellegance of Pottery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

		    <!-- Customized Bootstrap Stylesheet -->
			<link href="css/style.min.css" rel="stylesheet">
	</head>
<body>

<div class="container">
	<div class="row d-flex justify-content-center mt-5">
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary mt-5 ">Create a new account</h3>
		
		<!-- Link for redirecting to Login Page -->
		<a href="login.php" class="mt-2">Already a member? Log in here</a>
		<br style="clear:both;"/><br />
		<div class="col-md-3 align-content-end"></div>
		<div class="col-md-6">
			<!-- Registration Form start -->
			<form method="POST" action="save_member.php">	
				<div class="alert alert-info">Registration</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Firstname</label>
					<input type="text" name="firstname" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input type="text" name="lastname" class="form-control" required="required"/>
				</div>
				<?php
					//checking if the session 'success' is set. Success session is the message that the credetials are successfully saved.
					if(ISSET($_SESSION['success'])){
				?>
				<!-- Display registration success message -->
				<div class="alert alert-success"><?php echo $_SESSION['success']?></div>
				<?php
					//Unsetting the 'success' session after displaying the message. 
					unset($_SESSION['success']);
					}
				?>
				<button class="btn btn-primary btn-block text-light" name="register"><span class="glyphicon glyphicon-save"></span> Register</button>
				<a href="index.php" class="btn btn-primary btn-block text-light"><span class="glyphicon glyphicon-save"></span> Go Back</a>
			</form>	
			<!-- Registration Form end -->
		</div>
	</div>
	</div>
</div>
</body>
</html>