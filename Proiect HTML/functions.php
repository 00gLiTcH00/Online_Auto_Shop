<?php

function login_state($conn)
{
	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "select * from login_signup_system where user_id = '$id' limit 1";
		
		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	else
	{
		header("Location: login.php");
		die;
	}
}

function random_id($lenght)
{
	$id = "";
	if($lenght < 4)
	{
		$lenght = 4;
	}
	$len = rand(3,$lenght);
	for($i=0 ; $i < $len ; $i++)
	{
		$id .= rand(0,9);
	}
	return $id;
}

?>