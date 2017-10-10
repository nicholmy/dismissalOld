<?php include("../../templates/db_connect.php"); ?>
<?php
	if ($_POST["teacherID"]) {
		$query = "";
		if ($_POST["lastName"]) {
			
			$lastName = mysqli_real_escape_string($_POST["lastName"]);
			$query = "UPDATE Teacher SET lastName = '" . $lastName . "' WHERE teacherID = '" . $_POST['teacherID'] . "';";
		
			$result = mysqli_query($conn, $query) or die('Error setting the name: '.mysqli_error($conn));
		
			echo("Last name updated successfully!<br />");
		}
		
		if ($_POST["firstName"]) {
			$firstName = mysqli_real_escape_string($_POST["firstName"]);
			$query = "UPDATE Teacher SET firstName = '" . $firstName . "' WHERE teacherID = '" . $_POST['teacherID'] . "';";
		
			$result = mysqli_query($conn, $query) or die('Error setting the name.'.mysqli_error($conn));
		
			echo("First name updated successfully! <br />");
		}
		
		if ($_POST["pride"]) {
			$query = "UPDATE Teacher SET pride = '" . $_POST['pride'] . "' WHERE teacherID = '" . $_POST['teacherID'] . "';";
		
			$result = mysqli_query($conn, $query) or die('Error setting the pride.'.mysqli_error($conn));
		
			echo("Pride updated successfully! <br />");
		}
	} else {
		echo("Invalid Teacher ID. Please hit back on your browser and try again.");
	}
?>