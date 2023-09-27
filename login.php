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
	<h3 class="text-primary mt-5 ml-1">Login to your account</h3>
		<!-- Link for redirecting page to Registration page -->
		<a href="sign_up.php">Not a member yet? Register here</a>
		<br style="clear:both;"/><br />
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<!-- Login Form Starts -->
			<form method="POST" action="login_query.php">	
				<div class="alert alert-info">Login</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required="required"/>
				</div>
				<?php
					//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
					if(ISSET($_SESSION['error'])){
				?>
				<!-- Display Login Error message -->
					<div class="alert alert-danger"><?php echo $_SESSION['error']?></div>
				<?php
					//Unsetting the 'error' session after displaying the message. 
					session_unset();
					}
				?>
				<button class="btn btn-primary btn-block text-light" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				<a href="index.php" class="btn btn-primary btn-block text-light"><span class="glyphicon glyphicon-save"></span> Go Back</a>
			</form>	
			</form>	
			<!-- Login Form Ends -->
		</div>
	</div>

				</div>
				</div>
</body>
</html>