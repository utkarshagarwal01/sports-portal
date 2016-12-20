<?php
	
	function redirect_to($new_location) {
		header('Location: ' . $new_location);
		exit;
	}

	function make_connection($dbname){
		//connect to the database
		$connection = mysqli_connect("localhost","root",'',"{$dbname}");
		//check if connection was successful
		if(mysqli_connect_errno($connection)){
			die('Database connection failed.');
		}
		else{
			return $connection;
		}
	}

	//functions to check the existence of a specific delegate number and whether it matches the specified gender (used in players.php)
	function check_info($gender,$d_number)
	{
		//make connection with database
		$conn = make_connection('revels17');
		//query to check if the participant exists
		$query = 'SELECT COUNT(1) FROM participant WHERE ID = '.$d_number;
		$res = mysqli_query($conn,$query);
		if(!$res)
			return -99;
		else
		{
			$log = mysqli_fetch_assoc($res);
			$ans = $log['COUNT(1)'];
			if($ans == '0')
			{
				return 0;
			}
		}
		//the participant exists, now check if the gender is correct
		$query = 'SELECT COUNT(1) FROM participant WHERE ID = '.$d_number.' AND GENDER = "'.$gender.'"';
		$res = mysqli_query($conn,$query);
		if(!$res)
			return -98;
		else
		{
			$log = mysqli_fetch_assoc($res);
			$ans = $log['COUNT(1)'];
			if($ans == '0')
			{
				return 100;
			}
		}
		return 1;
	}

	//function to get info about each participant (used in show_confirmed.php)
	function retrieve_info($delegate_number,$flag=0)
	{
		//make connection
		$conn = make_connection('revels17');
		//check if the participant exists
		$query = 'SELECT * FROM participant WHERE ID = '.$delegate_number;
		$res = mysqli_query($conn,$query);
		if(!$res)
			return -99;
		else{
			while($log = mysqli_fetch_assoc($res)){
				if($flag==1)
				{
					$arr = array();
					array_push($arr, $log['REGNO']);
					array_push($arr, $log['NAME']);
					return $arr;
				}
				echo 'Delegate number : '.$delegate_number.'<br>Name : ' . $log['NAME'] . '<br>Registration number : ' . $log['REGNO']. '<br>';
			}
		}
	}

	function in_database($t_id)
	{
		//make connection with database
		$conn = make_connection('revels17');
		//query to check if the participant exists
		$query = 'SELECT COUNT(1) FROM team WHERE TEAM_ID = '.$t_id;
		$res = mysqli_query($conn,$query);
		if(!$res)
			return -99;
		else
		{
			$log = mysqli_fetch_assoc($res);
			$ans = $log['COUNT(1)'];
			if($ans == '0')
			{
				//count = 0, no records with the generated team id exist
				return 0;
			}
		}
		return 1;
	}

	//function to test the random number logic 
	function recur_test($t_id,$arr)
	{
		if(!in_array($t_id, $arr))
		{
			return $t_id;
		}
		$t_id=rand(1,200);
		return recur_test($t_id,$arr);
	}

	//function to generate random team_id
	function recur_unique_team_id($t_id)
	{
		if(!in_database($t_id))
		{
			return $t_id;
		}
		$t_id = rand(1,200);
		return recur_unique_team_id($t_id);
	}

	//function to add values to the team table (used in show_confirmed.php)
	function insert_team_info($team_id,$delegate_number,$gender,$sport)
	{		
		//make connection
		$conn = make_connection('revels17');
		//get the registration number
		$data = retrieve_info($delegate_number,1);
		$query = 'INSERT INTO team VALUES("'.$team_id.'","'.$delegate_number.'","'.$data[0]. '","'.$data[1] . '","'.$gender.'","'.$sport.'","' . '1")';
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		return 1;
	}

	function update_payment($delegate_numbers)
	{
		//make connection
		$conn = make_connection('revels17');
		foreach ($delegate_numbers as $delegate_number) {
			$query = 'UPDATE team SET PAYMENT = 1 WHERE D_ID = ' . $delegate_number;
			$res = mysqli_query($conn,$query);
			if(!$res)
			{
				//query failed
				return -99;
			}
		}
		return 1;
	}

	//function to check the existence of team id in team table
	function check_if_team_id_exists($team_id){
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE TEAM_ID = '" . $team_id . "'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			if($log["COUNT(1)"] == 0)
			{
				//team_id does not exist
				return 0;
			}
			$query = "SELECT * FROM team WHERE TEAM_ID = '" . $team_id . "'";
			$res = mysqli_query($conn,$query);
			if(!$res)
			{
				//query failed
				return -98;
			}
			else{
				$arr = array();
				while($log = mysqli_fetch_assoc($res)){
					array_push($arr, $log);
				}
				$_SESSION["team_info"] = $arr;
			}
			return 1;
		}
	}

?>
