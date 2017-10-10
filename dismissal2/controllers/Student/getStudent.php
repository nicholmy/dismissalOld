<?php include("../../templates/db_connect.php"); ?>
<?php
	
	if ($_GET["studentID"]) {
		$query = "SELECT * FROM Student WHERE id = " . $_GET['studentID'];
		
		$result = mysqli_query($conn, $query) or die('Error!');
		
		while($row = mysqli_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>