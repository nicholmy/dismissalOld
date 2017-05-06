<?php include("../../templates/db_connect.php"); ?>
<?php
	
	$query = "SELECT * FROM Day";
	
	$rs = mysql_query($query, $conn);
	
	while($row = mysql_fetch_array($rs)) {
		echo("<input type='checkbox' name='dayIDs[]' value='" . $row["id"] . "' />" . $row["name"] . "<br />");
	}
?>