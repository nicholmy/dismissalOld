<?php include("../templates/header.php"); include("../templates/db_connect.php"); ?>

<html>
<head>
	<title>Import Data</title>
	<link rel="stylesheet" href="../css/tabs.css" />
	<script type="text/javascript" src="../js/importView.js"></script>
</head>
<body>
	<ul id="tabs">
		<li><a href="#teacherContainer">Teachers</a></li>
		<li><a href="#busContainer">Buses</a></li>
		<li><a href="#studentContainer">Students</a></li>
	</ul>
	<div class="container" id="teacherContainer">
		<h2>Import Teacher Data</h2>
		<p>
			This will allow you to mass upload teachers to the database using an excel/csv file. <br /> 
			Use three columns, for the first name, last name, and the Pride that teacher is in charge of. <br />
			Example: Myles | Nicholson | 2009
		</p>
		<form enctype="multipart/form-data" method="post" role="form">
		<div class="form-group">
			<label for="exampleInputFile">File Upload: </label>
			<input type="file" name="teacherfile" id="file" size="150">
			<p class="help-block">Please be sure to only use Excel/CSV Files!</p>
		</div>
		<button type="submit" class="btn btn-default" name="Teacher" value="Teacher">Upload Teachers</button>
		</form>
		
		<div id="teacherToggle">
		<h2>Teachers in the Database:</h2>
		</div>
		<div id="teacherTable">
		</div>
	</div>
	
	<div class="container" id="busContainer">
		<h2>Import Bus Data</h2>
		<p>
			This will allow you to mass upload bus data to the database using an excel/csv file. <br /> 
			Use five columns, for the bus ID, name, line order, driver name, and contact info. <br />
			Remember that car riders have a special ID of -1. <br />
			Example: 2009 | Blue Triangle | 15 | Mr. Nicholson | 576-8790
		</p>
		<form enctype="multipart/form-data" method="post" role="form">
		<div class="form-group">
			<label for="exampleInputFile">File Upload: </label>
			<input type="file" name="busfile" id="file" size="150">
			<p class="help-block">Please be sure to only use Excel/CSV Files!</p>
		</div>
		<button type="submit" class="btn btn-default" name="Bus" value="Bus">Upload Buses</button>
		</form>
		
		<div id="busToggle">
		<h2>Buses in the Database:</h2>
		</div>
		<div id="busTable">
		</div>
	</div>
	
	<div class="container" id="studentContainer">
		<h2>Import Student Data</h2>
		<p>
			This will allow you to mass upload student data to the database using an excel/csv file. <br /> 
			Use six columns, for the first name, last name, pride, home teacher first name, home teacher last name, and main bus ID. <br />
			Example: Myles | Nicholson | 2009 | Tammi | Sutton | -1 <br /> <br />
			Before uploading, remember: <br />
			<ul>
				<li>Car riders have a special bus ID of -1.</li>
				<li>Students with no bus assigned have a special bus ID of -2.</li>
				<li>The teachers must be added first before importing the students. </li>
				<li>The bus IDs in the file must match with the buses already in the database. </li>
				<li>The uploaded file must be in the .csv format.</li>
			</ul>
		</p>
		<form enctype="multipart/form-data" method="post" role="form">
			<div class="form-group">
				<label for="exampleInputFile">File Upload: </label>
				<input type="file" name="studentfile" id="file" size="150">
				<p class="help-block">Please be sure to only use Excel/CSV Files!</p>
			</div>
			<button type="submit" class="btn btn-default" name="Student" value="Student">Upload Students</button>
		</form>
		<div id="studentToggle">
		<h2>Students in the Database:</h2>
		</div>
		<div id="studentTable">
		</div>
	</div>
	<br />
	<div id="statusToggle"> <h2>Status:</h2> </div>
	<div id="Status">
	<p>
	<?php
		
		if(isset($_POST["Teacher"])) {
			
			if ( isset($_FILES["teacherfile"])) {
				
				//if there was an error uploading the file
				if ($_FILES["teacherfile"]["error"] > 0) {
					echo "Error. Return Code: " . $_FILES["teacherfile"]["error"] . "<br />";

				} else {
					$file = $_FILES['teacherfile']['tmp_name'];
					
					//if file already exists
					if (file_exists("upload/" . $file)) {
						echo $file . " already exists. ";
					} else {
						echo ("File uploaded successfully. <br />");
						$handle = fopen($file, "r");
						
						$c = 0;
						while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
						{
							//Store each column into a variable here
							$firstName = $filesop[0];
							$firstName = mysqli_real_escape_string($firstName);
							$lastName = $filesop[1];
							$lastName = mysqli_real_escape_string($lastName);
							$pride = $filesop[2];

							//print_r($firstName . " " . $lastName . " " . $pride . "<br />");
							
							$query = "INSERT INTO Teacher(teacherID, firstName, lastName, pride) VALUES(NULL, '$firstName', '$lastName', '$pride')";
							if (!mysqli_query($conn, $query)) {
								die ("Error: ".mysqli_error());
							} else {
								echo("Database updated successfully! Added $firstName $lastName ($pride) to the database. <br />");
							}
						}
						
					}
				}
			} else {
             echo "No teacher file selected <br />";
			}
		}
		
		if(isset($_POST["Bus"])) {
			
			if ( isset($_FILES["busfile"])) {
				
				//if there was an error uploading the file
				if ($_FILES["busfile"]["error"] > 0) {
					echo "Error. Return Code: " . $_FILES["busfile"]["error"] . "<br />";

				} else {
					$file = $_FILES['busfile']['tmp_name'];
					
					//if file already exists
					if (file_exists("upload/" . $file)) {
						echo $file . " already exists. ";
					} else {
						$handle = fopen($file, "r");
						echo ("File uploaded successfully. <br />");
						$c = 0;
						while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
						{
							//Store each column into a variable here
							$busID = $filesop[0];
							$name = $filesop[1];
							$lineOrder = $filesop[2];
							$driverName = $filesop[3];
							$contactNum = $filesop[4];

							//print_r($firstName . " " . $lastName . " " . $pride . "<br />");
							
							$query = "INSERT INTO Bus(busID, name, lineOrder, driverName, contactNum) VALUES('$busID', '$name', '$lineOrder', '$driverName', '$contactNum')";
							if (!mysqli_query($conn, $query)) {
								die ("Error: ".mysqli_error());
							} else {
								echo("Database updated successfully! Added $name ($driverName) to the database. <br />");
							}
						}
						
					}
				}
			} else {
             echo "No bus file selected <br />";
			}
		}
		
		if(isset($_POST["Student"])) {
			
			if ( isset($_FILES["studentfile"])) {
				
				//if there was an error uploading the file
				if ($_FILES["studentfile"]["error"] == 4) {
					echo "Error. Return Code: " . $_FILES["studentfile"]["error"] . ". Have you picked your file yet?<br />";

				} else if ($_FILES["studentfile"]["error"] > 0) {
					echo "Error. Return Code: " . $_FILES["studentfile"]["error"] . "<br />";
				}
				else {
					$file = $_FILES['studentfile']['tmp_name'];
					
					//if file already exists
					if (file_exists("upload/" . $file)) {
						echo $file . " already exists. ";
					} else {
						echo ("File uploaded successfully. <br />");
						$handle = fopen($file, "r");
						
						$c = 0;
						while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
						{
							//Store each column into a variable here
							$firstName = $filesop[0];
							$firstName = mysqli_real_escape_string($firstName);
							$lastName = $filesop[1];
							$lastName = mysqli_real_escape_string($lastName);
							$pride = $filesop[2];
							$teacherFirst = $filesop[3];
							$teacherFirst = mysqli_real_escape_string($teacherFirst);
							$teacherLast = $filesop[4];
							$teacherLast = mysqli_real_escape_string($teacherLast);
							$busID = $filesop[5];
							$teacherID = 0;

							//print_r($firstName . " " . $lastName . " " . $pride . "<br />");
							
							$query = "SELECT * FROM Teacher WHERE firstName='$teacherFirst' AND lastName='$teacherLast'";
		
							$result = mysqli_query($conn, $query) or die('Error: '.mysqli_error());
							
							while($row = mysqli_fetch_array($result)) {
								$teacherID = $row["teacherID"];
								echo ("Found $firstName's teacher: " . $teacherID . " (" . $row["firstName"] . " " . $row["lastName"] .  ") - ");
							}
							
							$query = "INSERT INTO Student(id, firstName, lastName, busID, homeTeacherID, pride) VALUES(NULL, '$firstName', '$lastName', '$busID', '$teacherID', '$pride')";
							if (!mysqli_query($conn, $query)) {
								die ("Error: ".mysqli_error());
							} else {
								echo("Database updated successfully! Added $firstName $lastName ($pride) to the database. <br />");
							}
							//Apparently this is depreciated? Well then... >_> I do wish I was using mysqli tho
							$id = mysqli_insert_id();
							$dayID = 2;
							while ($dayID <= 6) {
								$query = "INSERT INTO Assignment(dayID, studentID, busID, notes) VALUES('$dayID', '$id', '$busID', '')";
								$result = mysqli_query($conn, $query) or die('Error: '.mysqli_error());
								
								$dayID = $dayID + 1;
							}
							echo("Assignments for the week successfully added for $firstName $lastName.<br/>");
						}
						
					}
				}
			} else {
             echo "No student file selected <br />";
			}
		}
	?>
	</p>
	</div>
	
</body>
</html>
<?php include("../templates/footer.php"); ?>