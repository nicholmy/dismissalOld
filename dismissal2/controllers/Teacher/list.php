<?php include("../../templates/db_connect.php"); ?>
<table>
    <tr>
			<th>Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Bus Line Name</th>
    </tr>
	<?php
		
		$query = "SELECT * FROM Teacher";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["teacherID"] . "</td>" .
						"<td>" . $row["firstName"] . "</td>" .
						"<td>" . $row["lastName"] . "</td>" .
						"<td>" . $row["lineName"] . "</td>" .
				 "</tr>");
		}
	?>
</table>