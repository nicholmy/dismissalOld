<?php include("../../templates/header.php"); include("../../templates/db_connect.php"); ?>
<html>
<head>
	<title>Edit Student</title>
</head>
<body>
	<?php
		
		if ($_POST["studentID"]) {
			$query = "";
			if ($_POST["lastName"]) {
				$lastName = mysqli_real_escape_string($_POST["lastName"]);
				$query = "UPDATE Student SET lastName = '" . $lastName . "' WHERE id = '" . $_POST['studentID'] . "';";
			
				$result = mysqli_query($conn, $query) or die('Error setting the name: '.mysqli_error($conn));
			
				echo("Last name updated successfully!<br />");
			}
			
			if ($_POST["firstName"]) {
				$firstName = mysqli_real_escape_string($_POST["firstName"]);
				
				$query = "UPDATE Student SET firstName = '" . $firstName . "' WHERE id = '" . $_POST['studentID'] . "';";
			
				$result = mysqli_query($conn, $query) or die('Error setting the name.'.mysqli_error($conn));
			
				echo("First name updated successfully! <br />");
			}
			
			if ($_POST["pride"]) {
				$query = "UPDATE Student SET pride = '" . $_POST['pride'] . "' WHERE id = '" . $_POST['studentID'] . "';";
			
				$result = mysqli_query($conn, $query) or die('Error setting the pride.'.mysqli_error($conn));
			
				echo("Pride updated successfully! <br />");
			}
			
			if ($_POST["homeTeacherID"]) {
				$query = "UPDATE Student SET homeTeacherID = '" . $_POST['homeTeacherID'] . "' WHERE id = '" . $_POST['studentID'] . "';";
			
				$result = mysqli_query($conn, $query) or die('Error setting the bus.'.mysqli_error($conn));
			
				echo("Home teacher updated successfully! <br />");
			}
		} else {
			echo("Invalid Assignment ID. Please hit back on your browser and try again.");
		}
	?>
	<a href="../../reports/editStudents.php">Edit more students</a>
</body>
</html>
<?php include("../../templates/footer.php"); ?>