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
			<th>Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if ($_GET["busID"]) {
				$query = "SELECT Student.firstName, Student.lastName, Override.notes
							FROM Override
							JOIN Student ON Override.studentID = Student.id
							WHERE Override.busID = '$_GET[busID]' AND date = '$date'
							ORDER BY Student.firstName, Student.lastName";
							
				$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error());
			
				while($row = mysqli_fetch_array($result)) {
					echo("<tr>" .
							"<td>" . $row["firstName"] . "</td>" .
							"<td>" . $row["lastName"] . "</td>" .
							"<td>" . $row["notes"] . "</td>" .
						 "</tr>");
				}
			}
		?>
	</tbody>
</table>