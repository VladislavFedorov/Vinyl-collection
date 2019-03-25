<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login page</title>
	
	<style>
		#admin-login-page {
				color: red;
		}
	</style>
</head>

<body>

<div id="admin-login-page" > 
	<form class="form-signin">
		<input type="email" id="input_email" placeholder="Login" name="username">
		<input type="password" id="input_password" placeholder="Password" name="password">
		<a href="adminlogin.php" type="submit">Login</a>
	</form>
</div>

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

};

?>

</body>