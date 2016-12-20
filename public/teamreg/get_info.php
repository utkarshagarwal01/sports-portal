<?php
session_start();
include("included_functions.php");
if(isset($_POST["submit"])){
	$_SESSION["sport"] = $_POST["sport"];
	redirect_to("enter_players.php");
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<div>
<form action="get_info.php" method="POST">
	<input type="radio" name="sport" value="basketball" required="required"><label for="basketball">Basketball</label>
	<input type="radio" name="sport" value="football" required="required"><label for="football">Football</label>
	<br><input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>