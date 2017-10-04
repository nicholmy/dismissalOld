<?php include("../templates/header.php"); include("../templates/db_connect.php"); ?>

<html>
<head>
	<title>Clear Database Data</title>
	<script type="text/javascript" src="../js/clearDatabases.js"></script>
</head>
<body>
	<h2>Wipe Databases</h2>
	<form method="post">
		<p>
			WARNING: There's no undo button, so make sure you really want to delete something!
		</p>
		<input type="button" id="clearStudent" value="Clear all Students" />
		<br /> <br />
		<input type="button" id="clearBus" value="Clear all Buses" />
		<br /> <br />
		<input type="button" id="clearTeacher" value="Clear all Teachers" />
		<br /> <br />
	</form>
	
	<p>
	Status: <div id="status"></div>
	</p>

</body>
</html>
<?php include("../templates/footer.php"); ?>