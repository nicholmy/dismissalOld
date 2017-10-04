<?php include("../../templates/db_connect.php"); ?>
<?php
	
	if ($_GET["busID"]) {
		$query = "SELECT * FROM Bus WHERE busID = " . $_GET['busID'];
		
		$result = mysql_query($query, $conn) or die('Error: '.mysql_error());
		
		while($row = mysql_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>