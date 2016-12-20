<?php
$msg="";
session_start();
include("included_functions.php");
if(isset($_POST["submit"]))
{
	if(is_numeric($_POST["team_id"])){
		if(check_if_team_id_exists($_POST["team_id"]))
			redirect_to("add_to_database.php");
		else{
			echo "Team ID does not exist.";
			die();
		}
	}
	else
	{
		$msg = "Enter a valid team ID";
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $msg;?>
<div>
<form action="search_team_id.php" method="POST">
	Enter:<br>
	<input type="text" name="team_id" required="required" placeholder="Team ID">
	<br><input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>