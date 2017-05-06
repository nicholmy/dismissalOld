<?php include("../../templates/db_connect.php"); ?>

<table>
    <tr>
			<th>busID</th>
			<th>Name</th>
			<th>lineName</th>
			<th>lineOrder</th>
			<th>driverName</th>
    </tr>
	<?php
		
		$query = "SELECT * FROM Bus";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["busID"] . "</td>" .
						"<td>" . $row["name"] . "</td>" .
						"<td>" . $row["lineName"] . "</td>" .
						"<td>" . $row["lineOrder"] . "</td>" .
						"<td>" . $row["driverName"] . "</td>" .
				 "</tr>");
		}
	?>
</table>