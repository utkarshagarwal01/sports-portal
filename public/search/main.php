<?php
session_start();
include("included_functions.php");
$message="";
if(isset($_POST["submit"]))
{
	$team_id_flag = false;
	$d_id_flag = false;
	$regno_flag = false;
	if(isset($_POST["team_id"]))
	{
		if(is_numeric($_POST["team_id"]))
		{
			$team_id_flag = true;
		}
	}
	if(isset($_POST["d_id"]))
	{
		if(is_numeric($_POST["d_id"]))
		{
			$d_id_flag = true;
		}
	}
	if(isset($_POST["regno"]))
	{
		if(ctype_alnum($_POST["regno"]))
		{
			$regno_flag = true;
		}
	}
	if(($team_id_flag==false) and ($d_id_flag==false) and ($regno_flag==false))
	{
		//none of the fields have been entered
		$message = "Please enter at least one of the fields.";
	}
	else
	{
		$_SESSION["team_id_flag"] = $team_id_flag;
		$_SESSION["d_id_flag"] = $d_id_flag;
		$_SESSION["regno_flag"] = $regno_flag;
		$_SESSION["team_id"] = $_POST["team_id"];
		$_SESSION["d_id"] = $_POST["d_id"];
		$_SESSION["regno"] = $_POST["regno"];
		redirect_to("search.php");
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $message;?>
<form method="POST" action="main.php">
	Search : 
	<br><input type="text" name="team_id" placeholder="Team ID"><br>
	<input type="text" name="d_id" placeholder="Delegate Number"><br>
	<input type="text" name="regno" placeholder="Registration Number"><br>
	<input type="submit" name="submit" value="Search">
</form>
</body>
</html>