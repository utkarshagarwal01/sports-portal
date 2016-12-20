<?php
//functions to check the participant details
	function is_alphabet($ch)
	{
		if(($ch >= 'A' and $ch <= 'Z')or($ch >= 'a' and $ch <= 'z'))
			return 1;
		return 0;
	}
	
	function check_name($name)
	{
		for($i=0;$i<strlen($name);$i++)
		{
			if(!(is_alphabet($name[$i]) or $name[$i] == "'" or $name[$i] == "." or $name[$i] == " "))
				return 0;
		}
		return 1;
	}

	function check_number($number)
	{
		$flag=1;
		$length_check = 0;
		if(strlen($number) >= 10)
			$length_check= 1;
		for($i=1;$i < strlen($number);$i++)
		{
			if(!is_numeric($number[$i]))
			{
				$flag=0;
				break;
			}
		}
		if(($number[0] == '+' or is_numeric($number[0])) and $flag and $length_check)
			return 1;
		return 0;
	}

	function check_email($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
	}
?>