<?php

session_start();
include("connection.php");
include("functions.php");
	
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$email = $_POST['email'];
	$nr_telefon = $_POST['nr_telefon'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_repeat = $_POST['password_repeat'];
	
	if(!empty($email) && !empty($nr_telefon) && !empty($username) && !empty($password) && !empty($password_repeat) && !is_numeric($username))
	{
		if($password === $password_repeat)
		{
			if(isset($_POST['bot_verification']))
			{
				$user_id = random_id(20);
				$query = "insert into login_signup_system (user_id,username,password,email,telephone) values ('$user_id','$username','$password','$email','$nr_telefon')";
				mysqli_query($conn,$query);
				$to = $email;
				$subject = "S-a produs cont!";
				$massage = "Bun venit. Codul tranzactiei este: $user_id";
				$headers = 'From: test@test.test';
				mail($to, $subject, $massage, $headers);
				header("Location: login.php");
				die;
			}
			else
			{
				echo '<script>alert("Esti bot nu? Daca nu ai fi fost ai fi bifat casuta.")</script>';
			}
		}
		else
		{
			echo '<script>alert("Nu ai reintrodus parola cum trebuie!")</script>';
		}
	}
	else
	{
		echo '<script>alert("Asigura-te ca tot este completat!")</script>';
	}
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>signup</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link href="CSS stuff/signup_php.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	
	<div class="form-box">
		<form action="signup.php" method="POST">
			<h1>Inscrie-te!</h1>
			
			<input type="text" name="email" placeholder="Adresa de e-mail:">
			<br>
			
			<input type="text" name="nr_telefon" placeholder="Numarul de telefon:">
			<br>
			
			<input type="text" name="username" placeholder="Creati un nume de utilizator:">
			<br>
			
			<div class="pass">
				<input type="password" name="password" placeholder="Creati o parola:" id="password">
				<input type="checkbox" onclick="visibility()" id="pass_visible">
				<label for="pass_visible"><i style="color: #C0C0C0" id="pass_icon" class="bi bi-eye"></i></label>
				<br>
			</div>
			<div class="pass">
				<input type="password" name="password_repeat" placeholder="Reintroduceti parola:" id="password_repeat">
				<input type="checkbox" onclick="visibility_repeat()" id="pass_repeat_visible">
				<label for="pass_repeat_visible"><i style="color: #C0C0C0" id="pass_repeat_icon" class="bi bi-eye"></i></label>
				<br>
			</div>
			<div class="check">
				<input type="checkbox" id="bot_verification" name="bot_verification">
				<label for="bot_verification" style="color: #C0C0C0;">Bifati pentru a verifica ca nu sunteti un bot!</label>
			</div>
			<input type="submit" name="autentificare" value="Inregistrare" id="auth">
			<p style="margin: 30px 0px 7px 0px;">Ai deja cont?</p>
		</form>
		<button style="margin: 0px 0px 0px 150px;"><a href="login.php">Autentifica-te!</a></button>
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
		
		function visibility_repeat() 
        {
          var x = document.getElementById("password_repeat");
          if (x.type === "password") 
          {
                x.type = "text";
                document.getElementById("pass_repeat_icon").className = "bi bi-eye-slash";
          } 
        else 
          {
                x.type = "password";
                document.getElementById("pass_repeat_icon").className = "bi bi-eye";
          }
        }
		
</script>
	
</body>
</html>