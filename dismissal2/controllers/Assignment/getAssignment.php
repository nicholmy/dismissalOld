<?php include("../../templates/db_connect.php"); ?>

<?php
	
	if ($_GET["assignmentID"]) {
		$query = "SELECT * FROM Assignment WHERE id = " . $_GET['assignmentID'];
		
		$result = mysql_query($query, $conn) or die('Error!');
		
		while($row = mysql_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>