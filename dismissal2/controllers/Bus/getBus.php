<?php include("../../templates/db_connect.php"); ?>
<?php
	
	if ($_GET["busID"]) {
		$query = "SELECT * FROM Bus WHERE busID = " . $_GET['busID'];
		
		$result = mysqli_query($conn, $query) or die('Error: '.mysqli_error());
		
		while($row = mysqli_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>