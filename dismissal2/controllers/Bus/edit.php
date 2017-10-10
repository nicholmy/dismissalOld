<?php include("../../templates/db_connect.php"); ?>
<?php
	if ($_POST["busID"]) {
		$query = "";
		if ($_POST["name"]) {
			$query = "UPDATE Bus SET name = '" . $_POST['name'] . "' WHERE busID = '" . $_POST['busID'] . "';";
		
			$result = mysqli_query($conn, $query) or die('Error setting the name: '.mysqli_error($conn));
		
			echo("Bus name updated successfully!<br />");
		}
		
		if ($_POST["lineOrder"]) {
			$query = "UPDATE Bus SET lineOrder = '" . $_POST['lineOrder'] . "' WHERE busID = '" . $_POST['busID'] . "';";
		
			$result = mysqli_query($conn, $query) or die('Error setting the line order.'.mysqli_error($conn));
		
			echo("Line order updated successfully! <br />");
		}
		
		if ($_POST["driverName"]) {
			$query = "UPDATE Bus SET driverName = '" . $_POST['driverName'] . "' WHERE busID = '" . $_POST['busID'] . "';";
		
			$result = mysqli_query($conn, $query) or die('Error setting the driver\'s name.'.mysqli_error($conn));
		
			echo("Driver's name updated successfully! <br />");
		}
		
		if ($_POST["contactNum"]) {
			$query = "UPDATE Bus SET contactNum = '" . $_POST['contactNum'] . "' WHERE busID = '" . $_POST['busID'] . "';";
		
			$result = mysqli_query($conn, $query) or die('Error setting the contact number.'.mysqli_error($conn));
		
			echo("Contact number updated successfully! <br />");
		}
	} else {
		echo("Invalid Bus ID. Please hit back on your browser and try again.");
	}
?>