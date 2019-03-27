<!DOCTYPE html>

<head>
	<meta charset="utf-8">
    <title>login</title>

	<!-- For Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<style>
		h1 {
			margin-top: 20px;
		}
		
		.own-style {
			width: 200px;
			margin: auto;
			margin-bottom: 10px;
		}
	</style>
</head>

<body class="text-center">

<form class="form-signin">

<h1 class="h3 mb-3 font-weight-normal">admin panel</h1>
      
	<label for="inputEmail" class="sr-only">Login</label>
	<input type="email" id="inputEmail" class="form-control own-style" placeholder="Login" name="username">
		  
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control own-style" placeholder="Password" name="password">
     
	<a href="login.php" class="btn btn-lg btn-primary btn-block own-style" type="submit">Login</a>
 
</form>

<?php

session_start();

## Information about MySQL database:

$hostname = 'localhost';	## Hostname;
$username = 'root';			## MySQL login;
$password = '';				## MySQL password;
$database = 'vinyl_bd';		## Database name;
$usertable = "users";		## Table name;
 
$db = mysqli_connect($hostname, $username, $password, $database) or die ("ERROR: MySQL.");
mysqli_select_db($db, $database) or die ("ERROR: DB");

if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM `$usertable` WHERE username='$username' and password='$password'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	$count = mysqli_num_rows($result);
	
	if($count == 1) {
		$_SESSION['username'] = $username;
	} else{
		$error_message = "Error";
	}

if (isset($_SESSION['username'])){
	
	$username = $_SESSION['username'];
	echo "Hello " . $username;
	echo "<a href='logout.php'>Logout</a>";
	}
};

?>

</body>