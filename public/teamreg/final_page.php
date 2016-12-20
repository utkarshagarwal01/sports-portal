<?php
session_start();
$team_id = $_SESSION["team_id"];
echo "Team ID is " . $team_id;
echo "<br><a href='get_info.php'>Register another team</a>";
session_unset();
?>