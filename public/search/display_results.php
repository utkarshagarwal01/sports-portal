<?php
session_start();
//check if session variable have been set
if(isset($_SESSION["not_in_database"]))
{
	//participant has not registered
	echo "No items match this search.<br>";
	echo "<a href='main.php'>Try again</a>";
	unset($_SESSION["not_in_database"]);
	unset($_SESSION["participant_data"]);
	unset($_SESSION["team_data"]);
}
else if(isset($_SESSION["participant_data"]) and isset($_SESSION["team_data"]))
{
	//participant has a delegate number and has a team too
	//display relative details
	$details = $_SESSION["team_data"];
	$details_part = $_SESSION["participant_data"];
	echo "Team ID : ".$details["TEAM_ID"]."<br>"
		. "Delegate Number : ".$details["D_ID"]."<br>"
		. "Name : " .$details_part["NAME"]."<br>"
		. "Registration Number : " . $details["REGNO"]."<br>"
		. "Sport : " . $details["SPORT"] . "<br>";
	unset($_SESSION["not_in_database"]);
	unset($_SESSION["participant_data"]);
	unset($_SESSION["team_data"]);
}
else if(isset($_SESSION["participant_data"]) and !isset($_SESSION["team_data"]))
{
	//participant has a delgate number but has not registered for a team
	$details_part = $_SESSION["participant_data"];
	echo "Delegate Number : ".$details_part["ID"]."<br>"
		. "Name : " .$details_part["NAME"]."<br>"
		. "Registration Number : " . $details_part["REGNO"]."<br>The participant is not part of a team.";
	unset($_SESSION["not_in_database"]);
	unset($_SESSION["participant_data"]);
 }
else if(isset($_SESSION["team_info"]))
{
	$info = $_SESSION["team_info"];
	foreach ($info as $item) {
		echo "Team ID : ".$item["TEAM_ID"]."<br>"
		. "Delegate Number : ".$item["D_ID"]."<br>"
		. "Name : " .$item["NAME"]."<br>"
		. "Registration Number : " . $item["REGNO"]."<br>"
		. "Sport : " . $item["SPORT"] . "<br><br>";
	}
	unset($_SESSION["team_info"]);
}
else if(isset($_SESSION["team_delegate_info"]))
{
	$info = $_SESSION["team_delegate_info"];
	foreach ($info as $item) {
		echo "Team ID : ".$item["TEAM_ID"]."<br>"
		. "Delegate Number : ".$item["D_ID"]."<br>"
		. "Name : " .$item["NAME"]."<br>"
		. "Registration Number : " . $item["REGNO"]."<br>"
		. "Sport : " . $item["SPORT"] . "<br><br>";
	}
	unset($_SESSION["team_delegate_info"]);
}
else if(isset($_SESSION["team_regno_info"]))
{
	$info = $_SESSION["team_regno_info"];
	foreach ($info as $item) {
		echo "Team ID : ".$item["TEAM_ID"]."<br>"
		. "Delegate Number : ".$item["D_ID"]."<br>"
		. "Name : " .$item["NAME"]."<br>"
		. "Registration Number : " . $item["REGNO"]."<br>"
		. "Sport : " . $item["SPORT"] . "<br><br>";
	}
	unset($_SESSION["team_regno_info"]);
}
else if(isset($_SESSION["team_d_regno_info"]))
{
	$info = $_SESSION["team_d_regno_info"];
	foreach ($info as $item) {
		echo "Team ID : ".$item["TEAM_ID"]."<br>"
		. "Delegate Number : ".$item["D_ID"]."<br>"
		. "Name : " .$item["NAME"]."<br>"
		. "Registration Number : " . $item["REGNO"]."<br>"
		. "Sport : " . $item["SPORT"] . "<br><br>";
	}
	unset($_SESSION["team_d_regno_info"]);
}
else if(isset($_SESSION["team_d_regno_info"]))
{
	$info = $_SESSION["team_d_regno_info"];
	foreach ($info as $item) {
		echo "Team ID : ".$item["TEAM_ID"]."<br>"
		. "Delegate Number : ".$item["D_ID"]."<br>"
		. "Name : " .$item["NAME"]."<br>"
		. "Registration Number : " . $item["REGNO"]."<br>"
		. "Sport : " . $item["SPORT"] . "<br><br>";
	}
	unset($_SESSION["team_d_regno_info"]);
}
else if(isset($_SESSION["participant_d_regno"]) and isset($_SESSION["team_d_regno"]))
{
	//participant with entered regno and delegate number and has a team too
	//display relative details
	$details = $_SESSION["team_d_regno"];
	$details_part = $_SESSION["participant_d_regno"];
	echo "Team ID : ".$details["TEAM_ID"]."<br>"
		. "Delegate Number : ".$details["D_ID"]."<br>"
		. "Name : " .$details_part["NAME"]."<br>"
		. "Registration Number : " . $details["REGNO"]."<br>"
		. "Sport : " . $details["SPORT"] . "<br>";
	unset($_SESSION["not_in_database"]);
	unset($_SESSION["participant_d_regno"]);
	unset($_SESSION["team_d_regno"]);
}
else if(isset($_SESSION["participant_d_regno"]) and !isset($_SESSION["team_d_regno"]))
{
	//participant has a delgate number but has not registered for a team
	$details_part = $_SESSION["participant_d_regno"];
	echo "Delegate Number : ".$details_part["ID"]."<br>"
		. "Name : " .$details_part["NAME"]."<br>"
		. "Registration Number : " . $details_part["REGNO"]."<br>The participant is not part of a team.";
	unset($_SESSION["not_in_database"]);
	unset($_SESSION["participant_d_regno"]);
 }
 else if(isset($_SESSION["participant_regno"]) and isset($_SESSION["team_regno"]))
{
	//participant with entered regno has a team too
	//display relative details
	$details = $_SESSION["team_regno"];
	$details_part = $_SESSION["participant_regno"];
	echo "Team ID : ".$details["TEAM_ID"]."<br>"
		. "Delegate Number : ".$details["D_ID"]."<br>"
		. "Name : " .$details_part["NAME"]."<br>"
		. "Registration Number : " . $details["REGNO"]."<br>"
		. "Sport : " . $details["SPORT"] . "<br>";
	unset($_SESSION["not_in_database"]);
	unset($_SESSION["participant_regno"]);
	unset($_SESSION["team_regno"]);
}
else if(isset($_SESSION["participant_regno"]) and !isset($_SESSION["team_regno"]))
{
	//user has entered the regno
	//participant has a delgate number but has not registered for a team
	$details_part = $_SESSION["participant_regno"];
	echo "Delegate Number : ".$details_part["ID"]."<br>"
		. "Name : " .$details_part["NAME"]."<br>"
		. "Registration Number : " . $details_part["REGNO"]."<br>The participant is not part of a team.";
	unset($_SESSION["not_in_database"]);
	unset($_SESSION["participant_regno"]);
 }
?>