<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["teacherID"]) {
		$query = "DELETE FROM Teacher WHERE teacherID = '$_POST[teacherID]'";
		 
		if (!mysql_query($query, $conn)) {
			echo ("Error: ".mysql_error () . "<br />Query: " . $query);
		} else {
			echo("Teacher deleted successfully!");
		}
	}
?>