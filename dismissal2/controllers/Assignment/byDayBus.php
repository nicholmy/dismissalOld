<?php include("../../templates/db_connect.php"); ?>
<h1>Normal Bus Assignments</h1>
<br />
<table>
    <tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Home Teacher</th>
    </tr>
	<?php
		#date_default_timezone_set('EST');
		#$date = date('Y/m/d');
		
		#TODO: Check if this is a valid date
		#if ($_GET["date"]) {
		#	$date = $_GET["date"];
		#}
		
		#$day = date('w', strtotime($date)) + 1;
		
		if ($_GET["busID"] && $_GET["dayID"]) {
			$query = "SELECT Student.firstName, Student.lastName, Teacher.lastName AS tLastName, Teacher.firstName AS tFirstName
						FROM Assignment
						JOIN Day ON Day.id = Assignment.dayID
						JOIN Student ON Assignment.studentID = Student.id
						JOIN Bus ON Assignment.busID = Bus.busID
						JOIN Teacher ON Teacher.teacherID = Student.homeTeacherID
						WHERE Bus.busID = '$_GET[busID]' AND Day.id = '$_GET[dayID]'
						ORDER BY Student.firstName, Student.lastName";
			
			$result = mysql_query($query, $conn) or die("Error: ".mysql_error());
			
			while($row = mysql_fetch_array($result)) {
				echo("<tr>" .
							"<td>" . $row["firstName"] . "</td>" .
							"<td>" . $row["lastName"] . "</td>" .
							"<td>" . $row["tFirstName"][0] . ". " . $row["tLastName"] . "</td>" .
					  "</tr>");
			}
		}
	?>
</table>