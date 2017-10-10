<?php include("../../templates/db_connect.php"); ?>
<?php
	if($_POST["studentID"] && $_POST["date"] && $_POST["busID"]) {
		$query = "INSERT INTO Override(date, studentID, busID) VALUES('$_POST[dateID]', '$_POST[studentID]', '$_POST[busID]')";
		
		if (!mysqli_query($conn, $query)) {
			echo ("Error: ".mysqli_error ());
		} else {
			echo("Database updated successfully!<br />");
		}
	} else {
		echo("Missing student, date, or bus information");
	}
?>