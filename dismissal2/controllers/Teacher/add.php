<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["firstName"] && $_POST["lastName"]) {
		$firstName = mysql_real_escape_string($_POST["firstName"]);
		$lastName = mysql_real_escape_string($_POST["lastName"]);
		$query = "INSERT INTO Teacher(teacherID, firstName, lastName, pride) VALUES(NULL, '$firstName', '$lastName', '$_POST[pride]')";
		
		if (!mysql_query($query, $conn)) {
			die ("Error: ".mysql_error ());
		} else {
			echo("Database updated successfully!");
		}
	}
?>
	