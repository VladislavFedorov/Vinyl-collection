<!DOCTYPE html>

<html lang = "en"> 
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	
	<!-- For Bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<style>
	h1, .centered { text-align: center; }
	.own-style {
		width: 200px;
		margin: auto;
		margin-bottom: 10px;
		text-align: center;
	}
	</style>
</head>

<body>

<h1 class="h3 mb-3 font-weight-normal">: Authorisation :</h1>

<div class="centered">
<form name="contact_form" method="post" onsubmit="return validate()" class="form-signin">
	<input type="text" name="email" class="form-control own-style"  value="Your Email">
	<input type="text" name="password" class="form-control own-style" value="Your Password">
	<input type="submit" value="Log In" class="btn btn-primary own-style">
</form>
</div>

<script>

function validate(){
   
   var email = document.forms["contact_form"]["email"].value;
   var password = document.forms["contact_form"]["password"].value;

   if (email.length == 0){
      alert("Please enter your email");
      return false;
   }

   if (password.length == 0){
      alert("Please enter your password.");
      return false;
   }

   var at = email.indexOf("@");
   var dot = email.indexOf(".");

   if (at < 1 || dot < 1){
      alert("Error in your email \n >>> '@' or '.' <<<");
      return false;
   }
};

</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>