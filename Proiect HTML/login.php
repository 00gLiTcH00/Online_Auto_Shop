<?php

session_start();
include("connection.php");
include("functions.php");
	
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(!empty($username) && !empty($password) && !is_numeric($username))
	{
		$query = "select * from login_signup_system where username = '$username' limit 1";
		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			if($user_data['password'] === $password)
			{
				$_SESSION['user_id'] = $user_data['user_id'];
				header("Location: index.php");
				die;
			}
			else
			{
				echo '<script>alert("Ceva informatie introdusa este gresita!")</script>';
			}
		}
		else
		{
			echo '<script>alert("Ceva informatie introdusa este gresita!")</script>';
		}
	}
	else
	{
		echo '<script>alert("Ceva informatie introdusa este gresita!")</script>';
	}
	
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link href="CSS stuff/login_php.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="form-box">
		<form action="login.php" method="POST">
			<h1>Buna straine!</h1>
			
			<p>Autentifica-te pentru a nu mai fi unu'!</p>
			
			<input type="text" name="username" placeholder="Numele de utilizator:">
			<br>
			
			<div class="pass">
				<input type="password" name="password" placeholder="Introduceti parola:" id = "password">
                <input type="checkbox" onclick="visibility()" id="pass_visible">
                <label for="pass_visible"><i style="color: #C0C0C0" id="pass_icon" class="bi bi-eye"></i></label>
				<br>
			</div>
			
			<div style="text-align: center; margin-top: 15px">
				<a href="#">Am uitat parola <i class="bi bi-emoji-frown"></i></a>
				<br>
			</div>
			<input type="submit" name="autentificare" value="Autentificare" id="auth">
			<p style="margin: 20px 0px 7px 0px;">Nu ai cont?</p>
		</form>
		<button style="margin: 0px 0px 0px 150px;"><a href="signup.php">Inscrie-te!</a></button>
	</div>
	
<script>
		
		function visibility() 
        {
          var x = document.getElementById("password");
          if (x.type === "password") 
          {
                x.type = "text";
                  document.getElementById("pass_icon").className = "bi bi-eye-slash";
          } 
        else 
          {
                x.type = "password";
                document.getElementById("pass_icon").className = "bi bi-eye";
          }
        }
		
</script>	
		
</body>
</html>