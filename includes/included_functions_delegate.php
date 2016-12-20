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

	//function to validate the user and admin details
	function match_info($uu,$up,$au,$ap)
	{
		$conn = make_connection("revels17");
		$query_1 = "SELECT * FROM user";
		$query_2 = "SELECT * FROM admin";
		$u_flag = 0;
		$a_flag = 0;
		$res_1 = mysqli_query($conn,$query_1);
		$res_2 = mysqli_query($conn,$query_2);
		if(is_null($res_1) or is_null($res_2))
			return -99;
		else
		{
			while($log = mysqli_fetch_assoc($res_1))
			{
				if((strcmp($uu, $log["username"]) == 0) && (strcmp($up, $log["password"])==0))
				{
					$u_flag = 1;
					break;
				}
			}
			while($log=mysqli_fetch_assoc($res_2))
			{
				if((strcmp($au, $log["username"]) == 0) && (strcmp($ap, $log["password"])==0))
				{
					$a_flag=1;
					break;
				}
			}
			if($u_flag and $a_flag)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}

	//function to insert participant details in database

	function insert_data($info)
	{
		//take out the data
		$name = $info["name"];
		$regno = $info["regno"];
		$college = $info["college"];
		$email = $info["email"];
		$phone = $info["phone"];
		$gender = $info["gender"];
		//make a connection to the database
		$conn = make_connection("revels17");
		$query = "INSERT INTO participant (NAME,REGNO,CLG_NAME,EMAIL,PHONE,GENDER) VALUES(\"". $name . "\",\"" . $regno . "\",\"".$college. "\",\"".$email . "\",\"". $phone."\",\"".$gender."\")";

		$res = mysqli_query($conn,$query);
		if(!$res)
			return -99;
		else
		{
			$query = "SELECT ID FROM participant WHERE REGNO= \"" . $regno . "\" AND EMAIL= \"" . $email."\"";
			$res = mysqli_query($conn,$query);
			if(!$res)
				return -98;
			else
			{
				$val = mysqli_fetch_assoc($res);
				return $val["ID"];
			}
		}
	}
	
?>
