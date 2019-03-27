<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Administration</title>
	
	<style>

	</style>
</head>

<body>

<!--

<form action="" method="post">
	<p><input type="email" id="input_email" placeholder="Login" name="username"></p>
	<p><input type="password" id="input_password" placeholder="Password" name="password"></p>
	<p><a href="adminlogin.php" type="submit">Login</a></p>
</form>

-->

<form action="index.php" method="post">
    <label for="login"><span class="indicators">Логин: </span></label>
    <input type="text" id="login" name="login" class="inputs">
	
    <label for="password"><span class="indicators">Пароль: </span></label>
    <input type="password" id="password" name="password" class="inputs">
	
    <input type="submit" value="Enter" id="signinbutton">
</form>


<?php


## Information about MySQL database:

$hostname = 'localhost';	## Hostname;
$username = 'root';			## MySQL login;
$password = '';				## MySQL password;
$database = 'vinyl_bd';		## Database name;
$usertable = "users";		## Table name;

####

# Получение данных из формы
$login = $_POST["login"];
$password = md5($_POST["password"]);
 
# Получение данных сессии (если есть)
session_start();
$slogin = $_SESSION['login'];
$spassword = $_SESSION['password'];
 
# Получение данных из базы
$sql = mysqli_connect($hostname, $username, $password, $database) or die ("ERROR: MySQL.");
$query = "SELECT login, password FROM administrators WHERE login='$login'";
$queryRes = mysqli_query($sql, $query) or die(mysqli_error($sql));
mysqli_close($sql);
while($row = mysqli_fetch_assoc($queryRes)){
    $blogin = $row['login'];
    $bpassword = $row['password'];
}
 
# Проверка если введенный логин соответствует логину из базы
if ($login===$blogin) {
    # Проверка если введенный пароль соответствует паролю из базы
    if ($password===$bpassword) {
        # Если все верно, создается сессия
        session_start();
        $_SESSION['login']=$login;
        $_SESSION['password']=$password;
        $logged = true;
    }
    else{
        # Иначе не создается ничего
        $logged = false;
    }
}
 
# Проверка если есть сессия
if (is_null($slogin)) {
    if (is_null($spassword)) {
        if (!$logged) {
        # Если сессии нет, клиент переадресуется на страницу авторизации
        header("Location: http://".$_SERVER['SERVER_NAME']."/admin_panel/signin.php?signup=false");
        }
    }
}

?>

</body>