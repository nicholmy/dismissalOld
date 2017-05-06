<?php include($_SERVER['DOCUMENT_ROOT'] . "/dismissal2/templates/db_connect.php"); ?>
<?php
	

	$query = "SELECT * FROM Day";
	
	$rs = mysql_query($query, $conn);
	
	echo("<option value=''></option>");
	while($row = mysql_fetch_array($rs)) {
		echo("<option value='" . $row["id"] . "'>" . $row["name"] . "</option>");
	}
?>