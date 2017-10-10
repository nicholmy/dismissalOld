<?php include("../../templates/db_connect.php"); ?>

<table>
    <tr>
			<th>ID</th>
			<th>Day</th>
			<th>Student ID</th>
			<th>Bus ID</th>
    </tr>
	<?php
		
		$query = "SELECT * FROM Assignment";
		
		$result = mysqli_query($conn, $query) or die('.mysqli_error');
		
		while($row = mysqli_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["id"] . "</td>" .
						"<td>" . $row["dayID"] . "</td>" .
						"<td>" . $row["studentID"] . "</td>" .
						"<td>" . $row["busID"] . "</td>" .
				 "</tr>");
		}
	?>
</table>