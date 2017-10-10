<?php include("../../templates/db_connect.php"); ?>
<table id="overrideTableList">
	<thead>
		<tr>
			<th>Date</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus</th>
			<th>Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$query = "SELECT Override.date, Student.firstName, Student.lastName, Bus.driverName, Bus.name, Bus.busID, Override.notes
						FROM Override
						JOIN Student ON Override.studentID = Student.id
						JOIN Bus ON Override.busID = Bus.busID
						ORDER BY Override.date DESC, Student.lastName, Student.firstName, Bus.lineOrder
						LIMIT 100";
			
			$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error());
			
			while($row = mysqli_fetch_array($result)) {
				echo("<tr>" .
						"<td>" . $row["date"] . "</td>" .
						"<td>" . $row["firstName"] . "</td>" .
						"<td>" . $row["lastName"] . "</td>");
						if ($row["busID"] != -1 && $row["busID"] != -8) {
							echo("<td>" . $row["driverName"] . "/" . $row["name"] . "/" . $row["busID"] . "</td>");
						} else {
							echo("<td>" . $row["name"] . "</td>");
						}
					echo("<td>" . $row["notes"] . "</td>" .
					 "</tr>");
			}
		?>
	</tbody>
</table>