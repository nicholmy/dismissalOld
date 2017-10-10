<?php include("../templates/header.php"); include("../templates/db_connect.php"); ?>

<html>
<head>
	<title>Import Student Data</title>
</head>
<body>
	<div id="directions">
		<h2>Directions</h2>
		<p>
			This page will allow you to mass upload student data to the database using an excel/csv file. <br /> 
			Use six columns, for the first name, last name, pride, home teacher first name, home teacher last name, and main bus ID. <br />
			Example: Myles | Nicholson | 2009 | Tammi | Sutton | -1 <br />
			Before uploading, remember: <br />
			<ul>
				<li>Car riders have a special bus ID of -1.</li>
				<li>The teachers must be added first before importing the students. </li>
				<li>The bus IDs in the file must match with the buses already in the database. </li>
				<li>The uploaded file must be in the .csv format.</li>
			</ul>
		</p>
	</div>
	<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload: </label>
        <input type="file" name="file" id="file" size="150">
    </div>
    <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
	<br />
	<div id="Status">
	<?php
		
		if(isset($_POST["Import"])) {
			
			if ( isset($_FILES["file"])) {
				
				//if there was an error uploading the file
				if ($_FILES["file"]["error"] == 4) {
					echo "Error. Return Code: " . $_FILES["file"]["error"] . ". Have you picked your file yet?<br />";

				} else if ($_FILES["file"]["error"] > 0) {
					echo "Error. Return Code: " . $_FILES["file"]["error"] . "<br />";
				}
				else {
					$file = $_FILES['file']['tmp_name'];
					
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
							$lastName = $filesop[1];
							$pride = $filesop[2];
							$teacherFirst = $filesop[3];
							$teacherLast = $filesop[4];
							$busID = $filesop[5];
							$teacherID = 0;

							//print_r($firstName . " " . $lastName . " " . $pride . "<br />");
							
							$query = "SELECT * FROM Teacher WHERE firstName='$teacherFirst' AND lastName='$teacherLast'";
		
							$result = mysql_query($conn, $query) or die('Error: '.mysql_error());
							
							while($row = mysql_fetch_array($result)) {
								$teacherID = $row["teacherID"];
								echo ("Found $firstName's teacher: " . $teacherID . " (" . $row["firstName"] . " " . $row["lastName"] .  ") - ");
							}
							
							$query = "INSERT INTO Student(id, firstName, lastName, busID, homeTeacherID, pride) VALUES(NULL, '$firstName', '$lastName', '$busID', '$teacherID', '$pride')";
							if (!mysql_query($conn, $query)) {
								die ("Error: ".mysql_error());
							} else {
								echo("Database updated successfully! Added $firstName $lastName ($pride) to the database. <br />");
							}
							
							$dayID = 2;
							while ($dayID <= 6) {
								$query = "INSERT INTO Assignment(dayID, studentID, busID, notes) VALUES('$dayID', LAST_INSERT_ID(), '$busID', '')";
								$result = mysql_query($conn, $query) or die('Error: '.mysql_error());
								
								$dayID++;
							}
							echo("Assignments for the week successfully added for $firstName $lastName.<br/>");
						}
						
					}
				}
			} else {
             echo "No file selected <br />";
			}
		}
	?>
	</div>
	</form>
</body>
</html>
<?php include("../templates/footer.php"); ?>