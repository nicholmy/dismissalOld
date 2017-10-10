<?php include("../../templates/db_connect.php"); ?>

<h1>Weekly Schedule for 
	<?php		
		if ($_GET["studentID"]) {
			$query = "SELECT firstName, lastName FROM Student WHERE id = '$_GET[studentID]'";
			
			$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error ());
			
			while($row = mysqli_fetch_array($result)) {
				echo($row["firstName"] . " " . $row["lastName"]);
			}
		} else {
			echo("Student");
		}
	?>
</h1>
<table class="bordered">
    <tr>
			<th>Day</th>
			<th>Bus</th>
			<th>Home Teacher</th>
    </tr>
	
	<?php
		
		if ($_GET["studentID"]) {
			$query = "SELECT Day.id, Day.name AS dayName, Assignment.notes, Bus.driverName, Bus.name, Bus.busID, Teacher.lastName AS teacherName
						FROM Assignment
						JOIN Day ON Day.id = Assignment.dayID
						JOIN Student ON Assignment.studentID = Student.id
						JOIN Bus ON Assignment.busID = Bus.busID
						JOIN Teacher ON Teacher.teacherID = Student.homeTeacherID
						WHERE Student.id = '$_GET[studentID]'
						ORDER BY Day.id";
			
			$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error ());
			
			while($row = mysqli_fetch_array($result)) {
				echo("<tr>" .
							"<td>" . $row["dayName"] . "</td>");
					if ($row["busID"] != -1 && $row["busID"] != -8) {
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