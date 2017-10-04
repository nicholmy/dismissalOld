<?php include("../../templates/db_connect.php"); ?>

<?php
	$query = "TRUNCATE TABLE Teacher";
	
	if (!mysql_query($query, $conn)) {
		echo ("Error: ".mysql_error() . "<br />Query: " . $query);
	} else {
		echo("Teacher table wiped successfully!");
	}
?>