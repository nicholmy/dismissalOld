<?php include("../../templates/db_connect.php"); ?>

<h1>Overrides for 
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
			<th>Date</th>
			<th>Bus</th>
			<th>Notes</th>
    </tr>
	
	<?php
		
		if ($_GET["studentID"]) {
			$query = "SELECT Override.date, Bus.driverName, Bus.name, Bus.busID, Override.notes
						FROM Override
						JOIN Bus ON Override.busID = Bus.busID
						WHERE Override.studentID = '$_GET[studentID]'
						ORDER BY Override.date";
			
			$result = mysqli_query($conn, $query) or die("Error: ".mysqli_error ());
			
			while($row = mysqli_fetch_array($result)) {
				echo("<tr>" .
							"<td>" . $row["date"] . "</td>");
					if ($row["busID"] != -1 && $row["busID"] != -8) {
						echo("<td>" . $row["driverName"] . "/" . $row["name"] . "/" . $row["busID"] . "</td>");
					} else {
						echo("<td>" . $row["name"] . "</td>");
					}
					echo("<td>" . $row["notes"] . "</td>" .
					 "</tr>");
			}
		}
	?>
</table>