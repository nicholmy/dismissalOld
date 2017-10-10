<?php include("../../templates/header.php"); include("../../templates/db_connect.php"); ?>
<?php
	if($_POST["busID"] && $_POST["name"] && $_POST["lineOrder"] ) {
		$query = "INSERT INTO Bus(busID, name, lineOrder, driverName, contactNum) VALUES('$_POST[busID]', '$_POST[name]', '$_POST[lineOrder]', '$_POST[driverName]', '$_POST[contactNum]')";
		
		if (!mysqli_query($conn, $query)) {
			echo ("Error: ".mysqli_error ());
		} else {
			echo("The " . $_POST["name"] . " was added successfully!");
		}
	}
?>
