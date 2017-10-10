<?php include("../../templates/db_connect.php"); ?>
<table id="teacherTable" class="center">
	<thead>
    <tr>
			<th>Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Pride</th>
    </tr>
	</thead>
	<tbody>
	<?php
		
		$query = "SELECT * FROM Teacher ORDER BY pride, lastName, firstName";
		
		$result = mysqli_query($conn, $query) or die('.mysqli_error');
		
		while($row = mysqli_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["teacherID"] . "</td>" .
						"<td>" . $row["firstName"] . "</td>" .
						"<td>" . $row["lastName"] . "</td>" .	
						"<td>" . $row["pride"] . "</td>" .
				 "</tr>");
		}
	?>
	</tbody>
</table>