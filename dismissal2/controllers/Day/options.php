<?php include($_SERVER['DOCUMENT_ROOT'] . "/dismissal2/templates/db_connect.php"); ?>
<?php
	

	$query = "SELECT * FROM Day";
	
	$rs = mysqli_query($conn, $query);
	
	echo("<option value=''></option>");
	while($row = mysqli_fetch_array($rs)) {
		echo("<option value='" . $row["id"] . "'>" . $row["name"] . "</option>");
	}
?>