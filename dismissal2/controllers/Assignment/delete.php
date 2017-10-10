<?php include("../../templates/header.php"); include("../../templates/db_connect.php"); ?>
<html>
<head>
	<title>Delete Assignment</title>
</head>
<body>
	<div id="status">
		<?php
			
			if($_POST["assignmentID"]) {
				$query = "DELETE FROM Assignment WHERE id = '$_POST[assignmentID]'";
				 
				if (!mysqli_query($conn, $query)) {
					echo ("Error: ".mysqli_error () . "<br />Query: " . $query);
				} else {
					echo("Assignment deleted successfully!");
				}
			}
		?>
	</div>
	<div id="top">
		<h1>Delete Assignments</h1>
		<form action="delete.php" method="post">
			<table>
				<tr>
					<td>Assignment:</td>
					<td>
						<select id="assignmentID" name="assignmentID">
							<?php include("options.php"); ?>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="Delete">
		</form>
	</div>
</body>
</html>
<?php include("../../templates/footer.php"); ?>