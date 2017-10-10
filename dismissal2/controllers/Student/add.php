<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["firstName"] && $_POST["lastName"] && $_POST["pride"] && $_POST["busID"] && $_POST["homeTeacherID"]) {
		$firstName = mysqli_real_escape_string($_POST["firstName"]);
		$lastName = mysqli_real_escape_string($_POST["lastName"]);
		$query = "INSERT INTO Student(firstName, lastName, pride, busID, homeTeacherID) VALUES( \"$firstName\", \"$lastName\", $_POST[pride], $_POST[busID], $_POST[homeTeacherID])";
		 
		if (!mysqli_query($conn, $query)) {
			echo ("Error: ".mysqli_error () . "<br />Query: " . $query);
		} else {
			echo("Student added successfully!");
			$sid = mysqli_insert_id($conn);
			
			for ($day = 2; $day <= 6; $day++) {
				$query2 = "INSERT INTO Assignment(dayID, studentID, busID) 
						VALUES($day, $sid, $_POST[busID])";
						
				$result = mysqli_query($query2, $conn) or die("Error: ".mysqli_error());
			}
			echo("<br />Assignments for the week added successfully!");
		}
	}
?>