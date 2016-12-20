<?php
include("included_functions.php");
session_start();
$team_id_flag = $_SESSION["team_id_flag"];
$d_id_flag = $_SESSION["d_id_flag"];
$regno_flag = $_SESSION["regno_flag"];
$team_id = $_SESSION["team_id"];
$d_id = $_SESSION["d_id"];
$regno = $_SESSION["regno"];
//since delegate number is unique for everyone, if the user has entered it, we can easily display results from it
//there are 8 possibilities 
if($d_id_flag and !$team_id_flag and !$regno_flag)
{
	//user has entered only delegate number
	//check whether the given delegate number exists
	//there are three kinds of possibilities
	//1. the person has not registered
	//2. the person has registered for a delegate card but not registered with a team
	//3. the person has registered both as an individual and as a team
	//check if the delegate number is present in participant table
	$var = check_existence_delegate_number($d_id);
	//check if the delegate number is present in team table
	$var_2 = check_existence_team($d_id);
	//possibility 1
	if($var < 0 || $var_2 < 0)
	{
		//query has failed
		echo "<a href='main.php'>Try again</a>";
		die();
	}
	else if($var == 0)
	{
		//person does not exist in the database
		$_SESSION["not_in_database"] = 1;
		redirect_to("display_results.php");
	}
	else if($var == 1 or $var_2 == 1)
	{
		redirect_to("display_results.php");
	}
}
else if($team_id_flag and !$d_id_flag and !$regno_flag)
{
	//user has entered only the team id
	$var = check_if_team_id_exists($team_id);
	//two possibilities
	//1. Team ID does not exist
	//2. Team ID exists
	if($var < 0)
	{
		//query has failed
		echo "<a href='main.php'>Try again</a>";
		die();
	}
	else if($var)
	{
		//team id exists
		redirect_to("display_results.php");
	}
	else if($var == 0)
	{
		//team id does not exist in the database
		$_SESSION["not_in_database"] = 1;
		redirect_to("display_results.php");
	}
}

else if($team_id_flag and $d_id_flag and !$regno_flag)
{
	//user has entered only the team id and delegate number
	$var = check_team_id_and_d_id($team_id,$d_id);
	//two possibilities
	//1. Match is not found
	//2. Match is found
	if($var < 0)
	{
		//query has failed
		echo "<a href='main.php'>Try again</a>";
		die();
	}
	else if($var)
	{
		//match found
		redirect_to("display_results.php");
	}
	else if($var == 0)
	{
		//match not found
		$_SESSION["not_in_database"] = 1;
		redirect_to("display_results.php");
	}
}

else if($team_id_flag and !$d_id_flag and $regno_flag)
{
	//user has entered only the team id and registration number
	$var = check_team_id_regno($team_id,$regno);
	//two possibilities
	//1. Match is not found
	//2. Match is found
	if($var < 0)
	{
		//query has failed
		echo "<a href='main.php'>Try again</a>";
		die();
	}
	else if($var)
	{
		//match found
		redirect_to("display_results.php");
	}
	else if($var == 0)
	{
		//match not found
		$_SESSION["not_in_database"] = 1;
		redirect_to("display_results.php");
	}
}
else if(!$team_id_flag and $d_id_flag and $regno_flag)
{
	//user has entered only delegate number and registration number
	//check whether the given delegate number and regno exists
	//there are three kinds of possibilities
	//1. the person has not registered
	//2. the person has registered for a delegate card but not registered with a team
	//3. the person has registered both as an individual and as a team
	//check if the delegate number and registration number are present in participant table
	$var = check_existence_delegate_regno($d_id,$regno);
	//check if the delegate number is present in team table
	$var_2 = check_existence_team_d_regno($d_id,$regno);
	//possibility 1
	if($var < 0 || $var_2 < 0)
	{
		//query has failed
		echo "<a href='main.php'>Try again</a>";
		die();
	}
	else if($var == 0)
	{
		//person does not exist in the database
		$_SESSION["not_in_database"] = 1;
		redirect_to("display_results.php");
	}
	else if($var == 1 or $var_2 == 1)
	{
		redirect_to("display_results.php");
	}
}
else if($team_id_flag and $d_id_flag and $regno_flag)
{
	//user has entered all
	$var = check_team_d_regno($team_id,$d_id,$regno);
	//two possibilities
	//1. Match is not found
	//2. Match is found
	if($var < 0)
	{
		//query has failed
		echo "<a href='main.php'>Try again</a>";
		die();
	}
	else if($var)
	{
		//match found
		redirect_to("display_results.php");
	}
	else if($var == 0)
	{
		//match not found
		$_SESSION["not_in_database"] = 1;
		redirect_to("display_results.php");
	}
}
else if(!$team_id_flag and !$d_id_flag and $regno_flag)
{
	//user has entered only registration number
	//check whether the given regno exists
	//there are three kinds of possibilities
	//1. the person has not registered
	//2. the person has registered for a delegate card but not registered with a team
	//3. the person has registered both as an individual and as a team
	//check if the delegate number and registration number are present in participant table
	$var = check_existence_regno($regno);
	//check if the delegate number is present in team table
	$var_2 = check_existence_team_regno($regno);
	//possibility 1
	if($var < 0 || $var_2 < 0)
	{
		//query has failed
		echo "<a href='main.php'>Try again</a>";
		die();
	}
	else if($var == 0)
	{
		//person does not exist in the database
		$_SESSION["not_in_database"] = 1;
		redirect_to("display_results.php");
	}
	else if($var == 1 or $var_2 == 1)
	{
		redirect_to("display_results.php");
	}
}
?>