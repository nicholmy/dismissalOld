<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["teacherID"]) {
		$query = "DELETE FROM Teacher WHERE teacherID = '$_POST[teacherID]'";
		 
		if (!mysqli_query($conn, $query)) {
			echo ("Error: ".mysqli_error () . "<br />Query: " . $query);
		} else {
			echo("Teacher deleted successfully!");
		}
	}
?>