<?php

session_start();
include("connection.php");
include("functions.php");

$user_data = login_state($conn);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formular produs</title>
</head>

<body>
	hello, <?php echo $user_data['username']; ?>
</body>
</html>