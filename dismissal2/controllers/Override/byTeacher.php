<?php include("../../templates/db_connect.php"); ?>

<?php
		
		date_default_timezone_set('EST');
		$date = date('Y/m/d');
?>

<h1>Overrides for <?php echo($date); ?></h1>

<table>
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus</th>
			<th>Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if ($_GET["teacherID"]) {
				$query = "SELECT Student.firstName, Student.lastName, Bus.driverName, Bus.name, Bus.busID, Override.notes
							FROM Override
							JOIN Student ON Override.studentID = Student.id
							JOIN Bus ON Override.busID = Bus.busID
							WHERE Student.homeTeacherID = '$_GET[teacherID]' AND date = '$date'";
							
				$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error());
			
				while($row = mysqli_fetch_array($result)) {
					echo("<tr>" .
							"<td>" . $row["firstName"] . "</td>" .
							"<td>" . $row["lastName"] . "</td>");
							if ($row["busID"] != -1 || $row["busID"] != -8) {
								echo("<td>" . $row["driverName"] . "/" . $row["name"] . "/" . $row["busID"] . "</td>");
							} else {
								echo("<td>" . $row["name"] . "</td>");
							}
						echo("<td>" . $row["notes"] . "</td>" .
						 "</tr>");
				}
			}
		?>
	</tbody>
</table>