<?php
	session_start();
	$var = $_SESSION["bitched_out"];
	echo $var ." delegate number already exists in the database.<br>";
	echo "<a href='players.php'>Enter again</a>.";
?>