<?php
include("../../includes/included_functions_delegate.php");
$message="";
if(isset($_POST["submit"]))
{
	$check = match_info($_POST["user_username"],$_POST["user_password"],$_POST["admin_username"],$_POST["admin_password"]);
	if($check == -99)
		$message = "Try again";
	else if($check)
		redirect_to("main.php");
	else
		$message="Incorrect username or password";
}	
?>
<html>
<head>
<title>Revels 2017</title>
</head>
<body>
<div id="form_1">
<form method="POST" action="index.php">
<br>User details :<br>
<input type="text" name="user_username" placeholder="Username"><br>
<input type="password" name="user_password" placeholder="Password"><br>
Admin details :<br>
<input type="text" name="admin_username" placeholder="Username"><br>
<input type="password" name="admin_password" placeholder="Password"><br>
<input type="submit" name="submit">
</form>
<?php
echo $message;
?>
</div>
</body>
</html>