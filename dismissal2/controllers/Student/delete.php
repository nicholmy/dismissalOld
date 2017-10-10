<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["studentID"]) {
		$query = "DELETE FROM Student WHERE id = '$_POST[studentID]'";
		 
		if (!mysqli_query($conn, $query)) {
			echo ("Error: ".mysqli_error () . "<br />Query: " . $query);
		} else {
			
			$sid = mysqli_insert_id($conn);
			
			$query2 = "DELETE FROM Assignment WHERE studentID='$_POST[studentID]'";
						
			$result = mysqli_query($query2, $conn) or die("Error: ".mysqli_error());
			
			$query3 = "DELETE FROM Override WHERE studentID='$_POST[studentID]'";
						
			$result = mysqli_query($query3, $conn) or die("Error: ".mysqli_error());
			
			echo("The student, their permanent assignments, and their temporary overrides have all been deleted successfully!");
		}
	}
?>