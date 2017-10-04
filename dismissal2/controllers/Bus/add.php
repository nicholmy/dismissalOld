<?php include("../../templates/header.php"); include("../../templates/db_connect.php"); ?>
<?php
	if($_POST["busID"] && $_POST["name"] && $_POST["lineOrder"] ) {
		$query = "INSERT INTO Bus(busID, name, lineOrder, driverName, contactNum) VALUES('$_POST[busID]', '$_POST[name]', '$_POST[lineOrder]', '$_POST[driverName]', '$_POST[contactNum]')";
		
		if (!mysql_query($query, $conn)) {
			echo ("Error: ".mysql_error ());
		} else {
			echo("The " . $_POST["name"] . " was added successfully!");
		}
	}
?>
