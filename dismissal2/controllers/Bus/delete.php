<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["busID"]) {
		$query = "DELETE FROM Bus WHERE busID = '$_POST[busID]'";
		 
		if (!mysqli_query($conn, $query)) {
			echo ("Error: ".mysqli_error () . "<br />Query: " . $query);
		} else {
			echo("Bus deleted successfully!");
		}
	}
?>