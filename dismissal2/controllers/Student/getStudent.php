<?php include("../../templates/db_connect.php"); ?>
<?php
	
	if ($_GET["studentID"]) {
		$query = "SELECT * FROM Student WHERE id = " . $_GET['studentID'];
		
		$result = mysql_query($query, $conn) or die('Error!');
		
		while($row = mysql_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>