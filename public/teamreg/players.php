<?php
session_start();
include("included_functions.php");
$message="";
$number_of_players = (int)$_SESSION["playernum"];
$flag = 1;
$gender = $_SESSION["gender"];
if(isset($_POST["submit"]))
{	
	for($j = 0; $j < $number_of_players;$j++){
		//check included_functions.php for function definition
		$var=check_info($gender,$_POST["input_".$j]);
		if($var < 0){
			//query failed, go back to the previous page
			echo "<a href='enter_players.php'>Try again</a>";
			die();
		}
		else if(!$var)
		{
			$message .= $_POST["input_".$j]." doesn't exist.<br>";
			//change flag to 0
			$flag = 0;
		}
		else if($var == 100)
		{
			$message .= $_POST["input_".$j]."'s gender does not match.<br>";
			$flag = 0;
		}
	}

	//if everything is correct, display all records
	if($flag)
	{
		//put all the delegate numbers in an array and put it in session
		$info = array();
		for($j = 0; $j < $number_of_players;$j++){
			$info[$j] = $_POST["input_".$j];
		}
		$_SESSION["d_numbers"] = $info;
		redirect_to("show_confirmed.php");
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $message;?>
<form method="POST" action="players.php">
	Enter delegate numbers of players:<br><?php
										$i=0;
										while($i < $number_of_players)
										{
										echo "<input type='text' name='input_" . $i . "' placeholder='Player ". ($i+1) . "' required='required'><br>";
										$i++;
										}
										?>
	<input type='submit' name='submit' value='Submit'>
</form>
</body>
</html>