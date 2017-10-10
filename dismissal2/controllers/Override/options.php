<?php include("../../templates/db_connect.php"); ?>
<?php
	
	# For selecting current month --->	WHERE Year(Override.date) = Year(CURRENT_TIMESTAMP) 
	#				AND Month(Override.date) = Month(CURRENT_TIMESTAMP)

	$query = "SELECT Override.id, Override.date, Student.firstName, Student.lastName, Bus.driverName, Bus.name, Bus.busID, Override.notes
				FROM Override
				JOIN Student ON Override.studentID = Student.id
				JOIN Bus ON Override.busID = Bus.busID
				ORDER BY Override.date DESC, Student.lastName, Student.firstName, Bus.driverName
				LIMIT 100";
	
	$rs = mysqli_query($conn, $query);
	
	echo("<option value=''></option>");
	while($row = mysqli_fetch_array($rs)) {
		echo("<option value='" . $row["id"] . "'>" . $row["date"] . " - " . $row["lastName"] . ", " . $row["firstName"] . " - ");
			if ($row["busID"] != -1) {
				echo($row["driverName"] . "/" . $row["name"] . "/" . $row["busID"]);
			} else {
				echo($row["name"]);
			}
		echo("</option>");
	}
?>