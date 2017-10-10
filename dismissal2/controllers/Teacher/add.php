<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["firstName"] && $_POST["lastName"]) {
		$firstName = mysqli_real_escape_string($_POST["firstName"]);
		$lastName = mysqli_real_escape_string($_POST["lastName"]);
		$query = "INSERT INTO Teacher(teacherID, firstName, lastName, pride) VALUES(NULL, '$firstName', '$lastName', '$_POST[pride]')";
		
		if (!mysqli_query($conn, $query)) {
			die ("Error: ".mysqli_error ());
		} else {
			echo("Database updated successfully!");
		}
	}
?>
	