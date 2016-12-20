<?php
//main page to display
//using iframe to display the input the values and confirmation page
session_start();
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="../../stylesheets/main_style.css">
	<meta http-equiv="refresh" content="10000;url=index.php">
	<title>Main page</title>
</head>
<body>
	<div id="wrapper">
		<header id="header">
			<a href="main.php" class="logo"><strong>System Admin</strong><span>MIT</span></a>
		</header>
		<div id="frame" style="width:300px;height:600px;">
			<iframe src="details.php"></iframe>
		</div>
	</div>
</body>
</html>