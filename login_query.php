<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT COUNT(*) as count FROM `member` WHERE `username` = :username AND `password` = :password";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$row = $stmt->fetch();
		
		$count = $row['count'];
		
		if($username == "admin" && $password == "1996"){
			$_SESSION['user'] = $username;
			header('location:dashbord.php');

		}else{
		if($count > 0){
			$_SESSION['isLogged']= TRUE;
			$_SESSION['user']= $username;
			header('location:index.php');


		}else{
			$_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
		}
		}
	}
?>