<?php include("../../templates/db_connect.php"); ?>
<?php
			
	if($_POST["firstName"] && $_POST["lastName"] && $_POST["pride"] && $_POST["busID"] && $_POST["homeTeacherID"]) {
		$firstName = mysql_real_escape_string($_POST["firstName"]);
		$lastName = mysql_real_escape_string($_POST["lastName"]);
		$query = "INSERT INTO Student(firstName, lastName, pride, busID, homeTeacherID) VALUES( \"$firstName\", \"$lastName\", $_POST[pride], $_POST[busID], $_POST[homeTeacherID])";
		 
		if (!mysql_query($query, $conn)) {
			echo ("Error: ".mysql_error () . "<br />Query: " . $query);
		} else {
			echo("Student added successfully!");
			$sid = mysql_insert_id($conn);
			
			for ($day = 2; $day <= 6; $day++) {
				$query2 = "INSERT INTO Assignment(dayID, studentID, busID) 
						VALUES($day, $sid, $_POST[busID])";
						
				$result = mysql_query($query2, $conn) or die("Error: ".mysql_error());
			}
			echo("<br />Assignments for the week added successfully!");
		}
	}
?>