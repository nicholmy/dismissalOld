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
							WHERE Override.busID = '$_GET[busID]' AND date = '$date'";
							
				$result = mysql_query($query, $conn) or die("Error: ".mysql_error());
			
				while($row = mysql_fetch_array($result)) {
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