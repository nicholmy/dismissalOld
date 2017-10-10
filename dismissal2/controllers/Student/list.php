<?php include("../../templates/db_connect.php"); include("../../templates/db_connect.php"); ?>
<table id="studentTable" class="center">
	<thead>
		<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Pride</th>
				<th>Home Teacher</th>
		</tr>
	</thead>
	<tbody>
	<?php
		
		$query = "SELECT Student.id, Student.pride, Student.lastName, Student.firstName, Teacher.lastName AS teacher FROM Student JOIN Teacher ON Student.homeTeacherID = Teacher.teacherID ORDER BY Student.pride, Student.lastName, Student.firstName";
		
		$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));
		
		while($row = mysqli_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["firstName"] . "</td>" .
						"<td>" . $row["lastName"] . "</td>" .
						"<td>" . $row["pride"] . "</td>" .
						"<td>" . $row["teacher"] . "</td>" .
				 "</tr>");
		}
	?>
	</tbody>
</table>