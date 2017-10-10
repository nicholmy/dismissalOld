<?php include("../../templates/db_connect.php"); ?>
<table>
	<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus</th>
			<th>Line</th>
	</tr>
	<?php
		
		if ($_GET["teacherID"]) {
			$query = "SELECT Student.firstName, Student.lastName, Student.homeTeacherID, Bus.driverName, Bus.name, Bus.busID, Bus.lineName FROM Student, Bus WHERE Student.busID = Bus.busID AND Student.homeTeacherID = '$_GET[teacherID]'";
			
			$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error ());
			
			while($row = mysqli_fetch_array($result)) {
				echo("<tr>" .
							"<td>" . $row["firstName"] . "</td>" .
							"<td>" . $row["lastName"] . "</td>");
				if ($row["busID"] != -1) {
					echo("<td>" . $row["driverName"] . "/" . $row["name"] . "/" . $row["busID"] . "</td>");
				} else {
					echo("<td>" . $row["name"] . "</td>");
				}
					echo("<td>" . $row["lineName"] . "</td>" .
					 "</tr>");
			}
		}
	?>
</table>