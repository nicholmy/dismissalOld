<?php include("../templates/header.php"); ?>
<html>
<head>
	<title>Edit Data Page</title>
	<link rel="stylesheet" href="../css/tabs.css" />
	<script type="text/javascript" src="../js/editData.js"></script>
</head>
<body>
	<ul id="tabs">
		<li><a href="#teacherContainer">Teachers</a></li>
		<li><a href="#busContainer">Buses</a></li>
		<li><a href="#studentContainer">Students</a></li>
	</ul>
	<div class="container" id="teacherContainer">
		<h1>Edit Teacher Information</h1>
		<p>
			Choose a teacher in the drop-down box below. Their information will automatically appear in the input boxes. Make changes and hit the "Save" button when you're finished.
		</p>
		<table>
			<tr>
				<td>Teacher:</td>
				<td>
					<select id="teacherID" name="teacherID">
						<?php include("../controllers/Teacher/options.php"); ?>
					</select> <br />
				</td>
			</tr>
			<tr>
				<td>First Name</td>
				<td>
					<input type="text" name="tfirstName" id="tfirstName" /> <br />
				</td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>
					<input type="text" name="tlastName" id="tlastName" /> <br />
				</td>
			</tr>
			<tr>
				<td>Pride</td>
				<td>
					<input type="text" name="tpride" id="tpride" /> <br />
				</td>
			</tr>
		</table>
		<br />
		<input type="button" id="teacherSubmit" value="Save New Changes" />
		<br /><br />
		<div id="teacherStatus"></div>
		<div id="ttable"></div>
	</div>
	<div class="container" id="busContainer">
		<h1>Edit Bus Information</h1>
		<p>
			Choose a bus in the drop-down box below. Their information will automatically appear in the input boxes. Make changes and hit the "Save" button when you're finished.
		</p>
		<table>
			<tr>
				<td>Bus:</td>
				<td>
					<select id="busID" name="busID">
						<?php include("../controllers/Bus/options.php"); ?>
					</select> <br />
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="busName" id="busName" /> <br />
				</td>
			</tr>
			<tr>
				<td>Line Order</td>
				<td>
					<input type="text" name="lineOrder" id="lineOrder" /> <br />
				</td>
			</tr>
			<tr>
				<td>Driver Name</td>
				<td>
					<input type="text" name="driverName" id="driverName" /> <br />
				</td>
			</tr>
			<tr>
				<td>Contact Number</td>
				<td>
					<input type="text" name="contactNum" id="contactNum" /> <br />
				</td>
			</tr>
		</table>
		<br />
		<input type="button" id="busSubmit" value="Save New Changes" />
		<br /><br />
		<div id="busStatus"></div>
		<div id="btable"></div>
	</div>
	<div class="container" id="studentContainer">
		<h1>Edit Student Information</h1>
		<p>
			Choose a student in the drop-down box below. Their information will automatically appear in the input boxes. Make changes and hit the "Save" button when you're finished.
		</p>
		<form action="../controllers/Student/edit.php" method="post">
			<table>
				<tr>
					<td>Student:</td>
					<td>
						<select id="studentID" name="studentID">
							<?php include("../controllers/Student/options.php"); ?>
						</select> <br />
					</td>
				</tr>
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" name="firstName" id="firstName" /> <br />
					</td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>
						<input type="text" name="lastName" id="lastName" /> <br />
					</td>
				</tr>
				<tr>
					<td>Pride</td>
					<td>
						<input type="text" name="pride" id="pride" /> <br />
					</td>
				</tr>
				<tr>
					<td>Home Teacher</td>
					<td>
						<select id="homeTeacherID" name="homeTeacherID">
							<?php include("../controllers/Teacher/options.php"); ?>
						</select> <br />
					</td>
				</tr>
			</table>
			<br />
			<input type="button" id="studentSubmit" value="Save New Changes" />
			<br />
			<div id="studentStatus"></div>
		</form>
		<br />
		<div id="stable"></div>
	</div>
	<br />
	
</body>
</html>
<?php include("../templates/footer.php"); ?>