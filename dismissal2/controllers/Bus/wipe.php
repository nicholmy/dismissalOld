<?php include("../../templates/db_connect.php"); ?>

<?php
	$query = "TRUNCATE TABLE Bus";
	
	if (!mysqli_query($conn, $query)) {
		echo ("Error: ".mysqli_error() . "<br />Query: " . $query);
	} else {
		echo("Bus table wiped successfully! <br />");
	}
	
	$query = "TRUNCATE TABLE Assignment";
	
	if (!mysqli_query($conn, $query)) {
		echo ("Error: ".mysqli_error() . "<br />Query: " . $query);
	} else {
		echo("Assignment table wiped successfully! <br />");
	}
	
	$query = "TRUNCATE TABLE Override";
	
	if (!mysqli_query($conn, $query)) {
		echo ("Error: ".mysqli_error() . "<br />Query: " . $query);
	} else {
		echo("Override table wiped successfully!");
	}
?>