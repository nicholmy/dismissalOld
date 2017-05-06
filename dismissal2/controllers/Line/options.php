<?php include("../../templates/db_connect.php"); ?>
<?php

	$query = "SELECT * FROM Line";
	
	$rs = mysql_query($query, $conn);
	
	echo("<option value=''></option>");
	while($row = mysql_fetch_array($rs)) {
		echo("<option value='" . $row["name"] . "'>" . $row["name"] . "</option>");
	}
?>