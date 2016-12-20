<?php
session_start();
include("included_functions.php");
$info = $_SESSION["team_info"];
$flag = 0;
$sport = $_SESSION["sport"];
if(isset($_POST["submit"]))
{
	//make an array of the delegate numbers which haven't paid yet
	//same as the loop below
	$arr = array();
	foreach ($info as $item) {
		if($item["PAYMENT"] == 0)
		{
			//push it in an array
			array_push($arr,$item["D_ID"]);
		}
	}
	$var = update_payment($arr);
	if($var < 0)
	{
		echo "<a href='search_team_id.php'>Try again.</a>";
		die();
	}
	else
	{
		echo "Updated successfully.";
		echo "<br><a href='get_info.php'>Go back.</a>"
		die();
	}

}
$total_price = 0;
foreach ($info as $item) {
	if($item["PAYMENT"] == 0)
	{
		//at least one person's money is unpaid
		$flag = 1;
		retrieve_info($item["D_ID"]);
		if($item["SPORT"] == "basketball" and $item["GENDER"] == "Male")
		{
			echo "Price = ₹500<br><br>";
			$total_price+=500;
		}
		else if($item["SPORT"]=="basketball" and $item["GENDER"] == "Female")
		{
			echo "Price = ₹200<br><br>";
			$total_price+=200;
		}
		else if($item["SPORT"]=="football" and $item["GENDER"] == "Male")
		{
			echo "Price = ₹700<br><br>";
			$total_price+=700;
		}
		else if($item["SPORT"]=="football" and $item["GENDER"]=="Female")
		{
			echo "Price = ₹900<br><br>";
			$total_price+=900;
		}
	}
}
if($flag)
	echo "Total price : ₹" . $total_price;
if(!$flag)
{
	echo "Team has already paid.";
	die();
}
echo "<form method='POST' target='add_to_databse.php'><br><input type='submit' name='submit' value='Confirm payment'></form>"
?>