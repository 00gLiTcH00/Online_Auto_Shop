<?php
session_start();
include("connection.php");
include("functions.php");

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>index</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link href="CSS stuff/index_php.css" rel="stylesheet" type="text/css">
	
</head>

<body>

	<header>
		<a href="" class="logo">Vericu' Auto Shop</a>
		<input type="checkbox" id="menubar">
		<label for="menubar"><i class="bi bi-three-dots-vertical"></i></label>
		<nav class="navbar">
			<ul>
				<li><a href="#" id="selected">Pagina principală</a></li>
				<li>
					<a href="#">Produse <i class="bi bi-caret-down"></i></a>
					<ul>
						<li>
							<a href="#">Mașini</a>

						</li>
						<li>
							<a href="#">Piese auto</a>
						</li>
					</ul>
				</li>
				<li><a href="#">Favorite</a></li>
				<li><a href="#">Coșul tău <i class="bi bi-cart4"></i></a></li>
				<li>
					<a href="#">Profil  <i class="bi bi-person-circle"></i></a>
					<ul>
						<li><a href="login.php">Autentifica-te</a></li>
						<li><a href="signup.php">Înscrie-te <i class="bi bi-person-plus"></i></a></li>
						<li><a href="formular_produs.php">Adaugă produs <i class="bi bi-plus-circle"></i></a></li>
						<li><a href="logout.php">Deconectare</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>

	
	
</body>
</html>