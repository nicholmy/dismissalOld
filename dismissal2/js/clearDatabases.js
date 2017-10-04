$(document).ready(function() {
	$("#clearStudent").click(function() {
		if (confirm("Are you sure you want to wipe all the student data? (This will delete their assignment and override data, too!")) {
			$.ajax({
				url : "../controllers/Student/wipe.php",
				success : function(response) {
					$("#status").html(response)
				}
			});
		}
	});
	
	$("#clearBus").click(function() {
		if (confirm("Are you sure you want to wipe all the bus data? (This will delete their assignment and override data, too!")) {
			$.ajax({
				url : "../controllers/Bus/wipe.php",
				success : function(response) {
					$("#status").html(response)
				}
			});
		}
	});
	
	$("#clearTeacher").click(function() {
		if (confirm("Are you sure you want to wipe all the teacher data?")) {
			$.ajax({
				url : "../controllers/Teacher/wipe.php",
				success : function(response) {
					$("#status").html(response)
				}
			});
		}
	});
	
});