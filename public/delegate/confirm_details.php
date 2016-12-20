<?php
session_start();
include("../../includes/included_functions_delegate.php");
if(isset($_SESSION["participant_details"]))
{	
	//retrieve the cookie
	$cookie = $_SESSION["participant_details"];
	//set parameter true to convert object into associative array
	$info = json_decode($cookie, true);
	$name = $info["name"];
	$regno = $info["regno"];
	$college = $info["college"];
	$email = $info["email"];
	$phone = $info["phone"];
	$gender = $info["gender"];
	echo "	<!DOCTYPE html>
			<head>
			<link rel='stylesheet' type='text/css' href='confirm_details_style.css'>
			<title>Confirm details</title>
			</head>
			<body style='color=#ffffff;'>
				<div id='frame'>
					<form action='success.php' method='POST'>
						Name : $name <br>
						Registration Number : $regno <br>
						College : $college <br>
						Email : $email <br>
						Phone Number : $phone <br>
						Gender : $gender <br>
						<input type='submit' name='submit' value='Confirm'>
					</form>
				</div>
			</body>
			</html>";

}
?>
