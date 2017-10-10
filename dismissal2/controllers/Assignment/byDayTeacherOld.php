<?php include("../../templates/db_connect.php"); ?>
<table>
    <tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus</th>
			<th>Line</th>
    </tr>
	<?php
		
		if ($_GET["teacherID"] && $_GET["dayID"]) {
			$query = "SELECT Day.name, Student.firstName, Student.lastName, Bus.driverName, Bus.name, Bus.busID, Teacher.lastName AS teacherName, Bus.lineName
						FROM Assignment
						JOIN Day ON Day.id = Assignment.dayID
						JOIN Student ON Assignment.studentID = Student.id
						JOIN Bus ON Assignment.busID = Bus.busID
						JOIN Teacher ON Teacher.teacherID = Student.homeTeacherID
						WHERE Day.id = '" . $_GET['dayID'] . "' AND Teacher.teacherID = '" . $_GET['teacherID'] . "'";
			
			$result = mysqli_query($conn, $query) or die('.mysqli_error');
			
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