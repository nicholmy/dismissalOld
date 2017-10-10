<?php include("../../templates/db_connect.php"); ?>

<h1>Schedule for 
	<?php		
		if ($_GET["studentID"]) {
			$query = "SELECT firstName, lastName FROM Student WHERE id = '$_GET[studentID]'";
			
			$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error ());
			
			while($row = mysqli_fetch_array($result)) {
				echo($row["firstName"] . " " . $row["lastName"]);
			}
		} else {
			echo("Student");
		}
	?>
</h1>

