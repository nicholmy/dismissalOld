<?php include("../../templates/db_connect.php"); ?>

<?php
	
	if ($_GET["assignmentID"]) {
		$query = "SELECT * FROM Assignment WHERE id = " . $_GET['assignmentID'];
		
		$result = mysqli_query($conn, $query) or die('Error!');
		
		while($row = mysqli_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>