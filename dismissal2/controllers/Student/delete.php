<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["studentID"]) {
		$query = "DELETE FROM Student WHERE id = '$_POST[studentID]'";
		 
		if (!mysql_query($query, $conn)) {
			echo ("Error: ".mysql_error () . "<br />Query: " . $query);
		} else {
			
			$sid = mysql_insert_id($conn);
			
			$query2 = "DELETE FROM Assignment WHERE studentID='$_POST[studentID]'";
						
			$result = mysql_query($query2, $conn) or die("Error: ".mysql_error());
			
			$query3 = "DELETE FROM Override WHERE studentID='$_POST[studentID]'";
						
			$result = mysql_query($query3, $conn) or die("Error: ".mysql_error());
			
			echo("The student, their permanent assignments, and their temporary overrides have all been deleted successfully!");
		}
	}
?>