<?php include("../../templates/db_connect.php"); ?>
<table>
	<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus</th>
			<th>Home Teacher</th>
	</tr>
	<?php
		
		if ($_GET["lineName"]) {
			$query = "SELECT Student.firstName, Student.lastName, Bus.driverName, Bus.name, Bus.busID, Teacher.lastName AS teacherName FROM Student JOIN Bus ON Student.busID = Bus.busID JOIN Teacher ON Student.homeTeacherID = Teacher.teacherID WHERE Bus.lineName = '$_GET[lineName]'";
			
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
					echo("<td>" . $row["teacherName"] . "</td>" .
					 "</tr>");
			}
		}
	?>
</table>