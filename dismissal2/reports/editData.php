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
		<h2>Teacher Portal</h2>
		<p>
			If you want to add a teacher, make sure the drop down box is EMPTY, fill in their information, then click the "Add" button.
			<br /> If you want to edit a teacher, pick a teacher in the drop-down box, make the appropriate changes, then click the "Save" button.
			<br /> If you want to delete a teacher, pick a teacher in the drop-down box, then click the "Delete" button.
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
				<td>*First Name</td>
				<td>
					<input type="text" name="tfirstName" id="tfirstName" /> <br />
				</td>
			</tr>
			<tr>
				<td>*Last Name</td>
				<td>
					<input type="text" name="tlastName" id="tlastName" /> <br />
				</td>
			</tr>
			<tr>
				<td>*Pride</td>
				<td>
					<input type="text" name="tpride" id="tpride" /> <br />
				</td>
			</tr>
		</table>
		<br />
		<input type="button" id="addTeacher" value="Add This Teacher" />
		<input type="button" id="teacherSubmit" value="Save New Changes" />
		<input type="button" id="deleteTeacher" value="Delete This Teacher" />
		<br /><br />
		<div id="teacherStatus"></div>
		<h2>Teacher Table</h2>
		<div id="ttable"></div>
	</div>
	<div class="container" id="busContainer">
		<h2>Bus Portal</h2>
		<p>
			If you want to add a bus, make sure the drop down box is EMPTY, fill in its information, then click the "Add" button.
			<br /> If you want to edit a bus, pick it in the drop-down box, make the appropriate changes, then click the "Save" button.
			<br /> If you want to delete a bus, pick it in the drop-down box, then click the "Delete" button.
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
				<td>*Bus ID:</td>
				<td>
					<input type="text" name="busIDInput" id="busIDInput" /> <br />
				</td>
			</tr>
			<tr>
				<td>*Name:</td>
				<td>
					<input type="text" name="busName" id="busName" /> <br />
				</td>
			</tr>
			<tr>
				<td>*Line Order:</td>
				<td>
					<input type="text" name="lineOrder" id="lineOrder" /> <br />
				</td>
			</tr>
			<tr>
				<td>Driver Name:</td>
				<td>
					<input type="text" name="driverName" id="driverName" /> <br />
				</td>
			</tr>
			<tr>
				<td>Contact Number:</td>
				<td>
					<input type="text" name="contactNum" id="contactNum" /> <br />
				</td>
			</tr>
		</table>
		<br />
		<input type="button" id="addBus" value="Add This Bus" />
		<input type="button" id="busSubmit" value="Save New Changes" />
		<input type="button" id="deleteBus" value="Delete This Bus" />
		<br /><br />
		<div id="busStatus"></div>
		<div id="btable"></div>
	</div>
	<div class="container" id="studentContainer">
		<h2>Student Portal</h2>
		<p>
			If you want to add a student, make sure the drop down box is EMPTY, fill in all of their information, then click the "Add" button.
			<br /> If you want to edit a student, pick them in the drop-down box, make the appropriate changes, then click the "Save" button.
			<br /> If you want to delete a student, pick them in the drop-down box, then click the "Delete" button.
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
					<td>*First Name:</td>
					<td>
						<input type="text" name="firstName" id="firstName" /> <br />
					</td>
				</tr>
				<tr>
					<td>*Last Name:</td>
					<td>
						<input type="text" name="lastName" id="lastName" /> <br />
					</td>
				</tr>
				<tr>
					<td>*Pride:</td>
					<td>
						<input type="text" name="pride" id="pride" /> <br />
					</td>
				</tr>
				<tr>
					<td>*Home Teacher:</td>
					<td>
						<select id="homeTeacherID" name="homeTeacherID">
							<?php include("../controllers/Teacher/options.php"); ?>
						</select> <br />
					</td>
				</tr>
				<tr id="mainBus">
					<td>*Main Bus:</td>
					<td>
						<select id="homeBusID" name="homeBusID">
							<?php include("../controllers/Bus/options.php"); ?>
						</select> <br />
					</td>
				</tr>
			</table>
			<br />
			<input type="button" id="addStudent" value="Add This Student" />
			<input type="button" id="studentSubmit" value="Save New Changes" />
			<input type="button" id="deleteStudent" value="Delete This Student" />
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