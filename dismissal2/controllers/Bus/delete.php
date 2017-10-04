<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["busID"]) {
		$query = "DELETE FROM Bus WHERE busID = '$_POST[busID]'";
		 
		if (!mysql_query($query, $conn)) {
			echo ("Error: ".mysql_error () . "<br />Query: " . $query);
		} else {
			echo("Bus deleted successfully!");
		}
	}
?>