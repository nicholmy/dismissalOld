<?php include("../../templates/header.php"); include("../../templates/db_connect.php"); ?>
<html>
<head>
	<title>Add Teacher</title>
</head>
<body>
	<div id="status">
		<?php
			
			if($_POST["lastName"]) {
				$query = "INSERT INTO Teacher(teacherID, firstName, lastName, pride) VALUES(NULL, '$_POST[firstName]', '$_POST[lastName]', '$_POST[pride]')";
				
				if (!mysql_query($query, $conn)) {
					die ("Error: ".mysql_error ());
				} else {
					echo("Database updated successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Add Teacher</h1>
		<form name="input" action="add.php" method="post">
			First Name: <input type="text" name="firstName" /> <br />
			Last Name: <input type="text" name="lastName" /> <br />
			Bus Line: <select name="lineName"><?php include("../Line/options.php"); ?></select> <br />
			<input type="submit" value="Submit" />
		</form>
	</div>
	<div id="bottom">
		<?php include("list.php"); ?>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>