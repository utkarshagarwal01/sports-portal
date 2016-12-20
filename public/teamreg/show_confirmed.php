<?php
session_start();
include("included_functions.php");
//get delegate numbers,gender,sport from session
$ret_info = $_SESSION["d_numbers"];
$gender = $_SESSION["gender"];
$sport = $_SESSION["sport"];
$total_price = 0;
foreach ($ret_info as $num) {
	retrieve_info($num);
	if($sport == "basketball" and $gender == "Male")
	{
		echo "Price = ₹500<br><br>";
		$total_price+=500;
	}
	else if($sport=="basketball" and $gender == "Female")
	{
		echo "Price = ₹200<br><br>";
		$total_price+=200;
	}
	else if($sport=="football" and $gender == "Male")
	{
		echo "Price = ₹700<br><br>";
		$total_price+=700;
	}
	else if($sport=="football" and $gender=="Female")
	{
		echo "Price = ₹900<br><br>";
		$total_price+=900;
	}
}
echo "Total price = ₹" . $total_price;
if(isset($_POST["submit"]))
{
	/* let's say we get around 200 teams in total, so we will generate a random number between 1 to 200, if the team id exists, another number will be generated otherwise the number will be assigned to a team*/
	
	$t_id = rand(1,200);
	$team_id = recur_unique_team_id($t_id);
	//flag to check if the query has failed or not
	$flag = 1;
	foreach ($ret_info as $delegate_number) {
		if(insert_team_info($team_id,$delegate_number,$gender,$sport) < 0)
		{
			//query has failed, break out of the loop
			$flag = $delegate_number;
			break;
		}
	}

	if($flag==1){
		//all queries were successful, generate team id
		$_SESSION["team_id"] = $team_id;
		redirect_to("final_page.php");
	}

	else
	{
		$_SESSION["bitched_out"] = $flag;
		redirect_to("failed_query.php");
	}

}
echo "<form method='POST' target='show_confirmed.php'><br><input type='submit' name='submit' value='Confirm payment'></form>"
?>