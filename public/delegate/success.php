<?php
session_start();
	echo '<link rel="stylesheet" type="text/css" href="main_style.css">';
include("../../includes/included_functions_delegate.php");
if(isset($_POST["submit"]))
{
	//retrieve the cookie
	$cookie = $_SESSION["participant_details"];
	//set parameter true to convert object into associative array
	$info = json_decode($cookie, true);
	$val = insert_data($info);
	if($val < 0)
		echo "Try again.";
	else
		echo "Delegate number is : $val<br><form action='details.php'><input type='submit' name='submit' value='Enter more details'></form>";
	//unset the session variable
	session_unset();
}
?>