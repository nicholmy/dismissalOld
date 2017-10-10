<?php include($_SERVER['DOCUMENT_ROOT'] . "/dismissal2/templates/db_connect.php"); ?>
<?php
	

	$query = "SELECT Assignment.id, Student.firstName, Student.lastName, Day.name AS dayName, Bus.driverName, Bus.name, Bus.busID
				FROM Assignment
				JOIN Day ON Day.id = Assignment.dayID
				JOIN Student ON Assignment.studentID = Student.id
				JOIN Bus ON Assignment.busID = Bus.busID
				WHERE 1
				ORDER BY Student.lastName, Student.firstName, Day.id, Bus.driverName";
	
	$rs = mysqli_query($conn, $query);
	
	echo("<option value=''></option>");
	while($row = mysqli_fetch_array($rs)) {
		echo("<option value='" . $row["id"] . "'>" . $row["lastName"] . ", " . $row["firstName"] . " - " . $row["dayName"] . " - ");
			if ($row["busID"] != -1) {
				echo($row["driverName"] . "/" . $row["name"] . "/" . $row["busID"]);
			} else {
				echo($row["name"]);
			}
		echo("</option>");
	}
?>