<!DOCTYPE html>

<head>
	<meta charset="utf-8">
    <title>login | admin panel</title>

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
  
<?php

## Information about MySQL database:

$hostname = 'localhost';	## Hostname;
$username = 'root';			## MySQL login;
$password = '';				## MySQL password;
$database = 'vinyl_bd';		## Database name;
$usertable = "users";		## Table name;
 
$db = mysqli_connect($hostname, $username, $password, $database) or die ("ERROR: MySQL.");
mysqli_select_db($db, $database) or die ("ERROR: DB");


session_start();

if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location: intropage.php");
}

if(isset($_POST["login"])){
	
if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query =mysql_query("SELECT * FROM usertbl WHEREusername='".$username."' AND password='".$password."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
 {
	 
while($row = mysql_fetch_assoc($query)){
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
}
  if($username == $dbusername && $password == $dbpassword)
 {
	// старое место расположения
	//  session_start();
	 $_SESSION['session_username']=$username;	 
 /* Перенаправление браузера */
   header("Location: intropage.php");
	}
	} else {
	//  $message = "Invalid username or password!";
	
	echo  "Invalid username or password!";
 }

} else {
    $message = "All fields are required!";
	}
	}



?>







<form class="form-signin">

<h1 class="h3 mb-3 font-weight-normal">admin panel</h1>
      
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" class="form-control own-style" placeholder="Email address" name="Login">
		  
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control own-style" placeholder="Password" name="Password">
      
     
<button class="btn btn-lg btn-primary btn-block own-style" type="submit">Sign in</button>

</form>


</body>