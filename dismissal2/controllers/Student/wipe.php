<?php include("../../templates/db_connect.php"); ?>

<?php
	$query = "TRUNCATE TABLE Student";
	
	if (!mysql_query($query, $conn)) {
		echo ("Error: ".mysql_error() . "<br />Query: " . $query);
	} else {
		echo("Student table wiped successfully! <br />");
	}
	
	$query = "TRUNCATE TABLE Assignment";
	
	if (!mysql_query($query, $conn)) {
		echo ("Error: ".mysql_error() . "<br />Query: " . $query);
	} else {
		echo("Assignment table wiped successfully! <br />");
	}
	
	$query = "TRUNCATE TABLE Override";
	
	if (!mysql_query($query, $conn)) {
		echo ("Error: ".mysql_error() . "<br />Query: " . $query);
	} else {
		echo("Override table wiped successfully!");
	}
?>