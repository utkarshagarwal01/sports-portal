<?php
include("included_functions.php");
session_start();
//retrieve session variable
$sport_selected = $_SESSION["sport"];
$message = "";
//if submit has been set check whether for the respective team sizes
if(isset($_POST["submit1"]))
{
	if($sport_selected=="basketball" and $_POST["gender"]=="Male" and $_POST["playernum"] > 5){
		$message = "Team size cannot exceed 5.";
	}
	else if($sport_selected=="basketball" and $_POST["gender"]=="Female" and $_POST["playernum"] > 6){
		$message = "Team size cannot exceed 6.";
	}
	else if($sport_selected=="football" and $_POST["gender"]=="Male" and $_POST["playernum"] > 11){
		$message = "Team size cannot exceed 11.";
	}
	else if($sport_selected=="football" and $_POST["gender"]=="Female" and $_POST["playernum"] > 15){
		$message = "Team size cannot exceed 15.";
	}
	else{
		$_SESSION["playernum"] = $_POST["playernum"];
		$_SESSION["gender"] = $_POST["gender"];
		redirect_to("players.php");
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $message;?>
<form method="POST" action="enter_players.php">
	Enter the number of players : 	<input type="text" name="playernum" required="required">
								  	<br><input type="radio" name="gender" value="Male" required="required"><label for="male">Male</label>
								  	<br><input type="radio" name="gender" value="Female" required="required"><label for="female">Female</label>
								  	<br><input type="submit" name="submit1">
</form>
OR
<a href="search_team_id.php">Enter Team ID</a>
</body>
</html>