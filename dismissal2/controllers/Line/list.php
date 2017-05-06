<?php include("../../templates/db_connect.php"); ?>
<table>
    <tr>
			<th>Name</th>
    </tr>
	<?php
		
		$query = "SELECT * FROM Line";
		
		$result = mysql_query($query, $conn) or die('.mysql_error');
		
		while($row = mysql_fetch_array($result)) {
			echo("<tr>" .
						"<td>" . $row["name"] . "</td>" .
				 "</tr>");
		}
	?>
</table>