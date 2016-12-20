<?php
	
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}

	function make_connection($dbname){
		//connect to the database
		$connection = mysqli_connect("localhost","root","","{$dbname}");
		//check if connection was successful
		if(mysqli_connect_errno($connection)){
			die("Database connection failed.");
		}
		else{
			return $connection;
		}
	}

	//function to check a delegate number in the participant table
	function check_existence_delegate_number($d_id){
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM participant WHERE ID = '" . $d_id . "'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$ans = $log["COUNT(1)"];
			if($ans == '0')
			{
				//the participant has not registered return 0
				return 0;
			}
		}
		//get the required record
		$query = "SELECT * FROM  participant WHERE ID = '".$d_id."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			return -98;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$_SESSION["participant_data"] = $log;
		}
		return 1;
	}
	//function to check the existence of a delegate in the team table
	function check_existence_team($d_id)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE D_ID = '" . $d_id . "'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$ans = $log["COUNT(1)"];
			if($ans == '0')
			{
				//the participant has not registered return 0
				return 0;
			}
		}
		//get the required record
		$query = "SELECT * FROM  team WHERE D_ID = '".$d_id."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			return -98;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$_SESSION["team_data"] = $log;
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

	function check_team_id_and_d_id($team_id,$d_id)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE TEAM_ID = '" . $team_id . "' AND D_ID = '" . $d_id ."'";
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
			$query = "SELECT * FROM team WHERE TEAM_ID = '" . $team_id . "' AND D_ID = '" . $d_id ."'";
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
				$_SESSION["team_delegate_info"] = $arr;
			}
			return 1;
		}
	}

	function check_team_id_regno($team_id,$regno)	
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE TEAM_ID = '" . $team_id . "' AND REGNO = '" . $regno ."'";
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
			$query = "SELECT * FROM team WHERE TEAM_ID = '" . $team_id . "' AND REGNO = '" . $regno ."'";
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
				$_SESSION["team_regno_info"] = $arr;
			}
			return 1;
		}
	}

	function check_d_id_regno($d_id,$regno)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE TEAM_ID = '" . $team_id . "' AND REGNO = '" . $regno ."'";
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
			$query = "SELECT * FROM team WHERE TEAM_ID = '" . $team_id . "' AND REGNO = '" . $regno ."'";
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
				$_SESSION["team_regno_info"] = $arr;
			}
			return 1;
		}
	}

	function check_team_d_regno($team_id,$d_id,$regno)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE TEAM_ID = '" . $team_id . "' AND REGNO = '" . $regno ."' AND D_ID = '".$d_id . "'";
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
			$query = "SELECT * FROM team WHERE TEAM_ID = '" . $team_id . "' AND REGNO = '" . $regno ."' AND D_ID = '".$d_id . "'";
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
				$_SESSION["team_d_regno_info"] = $arr;
			}
			return 1;
		}
	}

	function check_existence_delegate_regno($d_id,$regno)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM participant WHERE ID = '" . $d_id . "' AND REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$ans = $log["COUNT(1)"];
			if($ans == '0')
			{
				//the participant has not registered return 0
				return 0;
			}
		}
		//get the required record
		$query = "SELECT * FROM participant WHERE ID = '" . $d_id . "' AND REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			return -98;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$_SESSION["participant_d_regno"] = $log;
		}
		return 1;
	}

	function check_existence_team_d_regno($d_id,$regno)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE D_ID = '" . $d_id . "' AND REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$ans = $log["COUNT(1)"];
			if($ans == '0')
			{
				//the participant has not registered return 0
				return 0;
			}
		}
		//get the required record
		$query = "SELECT * FROM team WHERE D_ID = '" . $d_id . "' AND REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			return -98;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$_SESSION["team_d_regno"] = $log;
		}
		return 1;
	}
	function check_existence_regno($regno)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM participant WHERE REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$ans = $log["COUNT(1)"];
			if($ans == '0')
			{
				//the participant has not registered return 0
				return 0;
			}
		}
		//get the required record
		$query = "SELECT * FROM participant WHERE REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			return -98;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$_SESSION["participant_regno"] = $log;
		}
		return 1;
	}

	function check_existence_team_regno($regno)
	{
		//make connection
		$conn = make_connection("revels17");
		$query = "SELECT COUNT(1) FROM team WHERE REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			//query failed
			return -99;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$ans = $log["COUNT(1)"];
			if($ans == '0')
			{
				//the participant has not registered return 0
				return 0;
			}
		}
		//get the required record
		$query = "SELECT * FROM team WHERE REGNO = '".$regno."'";
		$res = mysqli_query($conn,$query);
		if(!$res)
		{
			return -98;
		}
		else{
			$log = mysqli_fetch_assoc($res);
			$_SESSION["team_regno"] = $log;
		}
		return 1;
	}
?>
