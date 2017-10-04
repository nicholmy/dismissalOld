<?php include("../templates/header.php"); include("../templates/db_connect.php"); ?>

<html>
<head>
	<title>Import Teachers</title>
	<script type="text/javascript" src="../js/importTeacherView.js"></script>
</head>
<body>
	<h2>Directions</h2>
	<p>
		This page will allow you to mass upload teachers to the database using an excel/csv file. <br /> 
		Use three columns, for the first name, last name, and the Pride that teacher is in charge of.
		Example: Myles | Nicholson | 2009
	</p>
	<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload: </label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Please be sure to only use Excel/CSV Files!</p>
    </div>
    <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
	<br />
	<div id="Status">
	<?php
		
		if(isset($_POST["Import"])) {
			
			if ( isset($_FILES["file"])) {
				
				//if there was an error uploading the file
				if ($_FILES["file"]["error"] > 0) {
					echo "Error. Return Code: " . $_FILES["file"]["error"] . "<br />";

				} else {
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

							//print_r($firstName . " " . $lastName . " " . $pride . "<br />");
							
							$query = "INSERT INTO Teacher(teacherID, firstName, lastName, pride) VALUES(NULL, '$firstName', '$lastName', '$pride')";
							if (!mysql_query($query, $conn)) {
								die ("Error: ".mysql_error());
							} else {
								echo("Database updated successfully! Added $firstName $lastName ($pride) to the database. <br />");
							}
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