<?php include("../../templates/db_connect.php"); ?>

<table id="busTable" class="center">
	<thead>
		<tr>
				<th>Bus ID</th>
				<th>Name</th>
				<th>Line Order</th>
				<th>Driver Name</th>
				<th>Contact Number</th>
		</tr>
	</thead>
	<tbody>
	<?php
		
		$query = "SELECT * FROM Bus ORDER BY lineOrder, name";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["busID"] . "</td>" .
						"<td>" . $row["name"] . "</td>" .
						"<td>" . $row["lineOrder"] . "</td>" .
						"<td>" . $row["driverName"] . "</td>" .
						"<td>" . $row["contactNum"] . "</td>" .
				 "</tr>");
		}
	?>
	</tbody>
</table>