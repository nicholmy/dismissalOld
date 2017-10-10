<?php include("../../templates/db_connect.php"); ?>
<?php
	
	if ($_GET["teacherID"]) {
		$query = "SELECT * FROM Teacher WHERE teacherID = " . $_GET['teacherID'];
		
		$result = mysqli_query($conn, $query) or die('Error: '.mysqli_error());
		
		while($row = mysqli_fetch_array($result)) {
			echo json_encode($row);
		}
	} else {
		echo("Error: No id provided.");
	}
?>