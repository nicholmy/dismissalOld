<?php include("../../templates/db_connect.php"); ?>
<?php
	
	$query = "SELECT * FROM Day";
	
	$rs = mysqli_query($conn, $query);
	
	while($row = mysqli_fetch_array($rs)) {
		echo("<input type='checkbox' name='dayIDs[]' value='" . $row["id"] . "' />" . $row["name"] . "<br />");
	}
?>