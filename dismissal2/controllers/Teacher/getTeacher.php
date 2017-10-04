<?php include("../../templates/db_connect.php"); ?>
<?php
	
	if ($_GET["teacherID"]) {
		$query = "SELECT * FROM Teacher WHERE teacherID = " . $_GET['teacherID'];
		
		$result = mysql_query($query, $conn) or die('Error: '.mysql_error());
		
		while($row = mysql_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>