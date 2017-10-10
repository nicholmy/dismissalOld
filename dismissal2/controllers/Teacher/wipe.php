<?php include("../../templates/db_connect.php"); ?>

<?php
	$query = "TRUNCATE TABLE Teacher";
	
	if (!mysqli_query($conn, $query)) {
		echo ("Error: ".mysqli_error() . "<br />Query: " . $query);
	} else {
		echo("Teacher table wiped successfully!");
	}
?>