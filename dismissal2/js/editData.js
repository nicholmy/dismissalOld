$(document).ready(function(){
	grabTables();
	
	/*************SUBMIT BUTTONS*****************/
	$('#studentSubmit').prop('disabled', true);
	$('#deleteStudent').prop('disabled', true);
	
	$('#busSubmit').prop('disabled', true);
	$('#deleteBus').prop('disabled', true);
	
	$('#teacherSubmit').prop('disabled', true);
	$('#deleteTeacher').prop('disabled', true);
	
	//For the tabs
	$('#tabs li a').addClass('inactive');
    $('.container').hide();
	$('.container:first').removeClass('inactive');
	$('.container:first').show();
	
	//When you click on a link, make all the others inactive, then activate the one you clicked on
	$('#tabs li a').click(function(){
		var t = $(this).attr('href');
		//Don't want it to do stuff if you click on the already active link
		if($(this).hasClass('inactive')){
			$('#tabs li a').addClass('inactive');
			$(this).removeClass('inactive');
			$('.container').hide();
			$(t).fadeIn('slow');
			return false;
		}
	});
	
	/*****************STUDENTS***********************/
	
	$("#studentID").change(function() {
		
		if ($("#studentID").val()) {
			updateDropDowns($(this).val());
			grabTables();
			$("#mainBus").hide();
			$('#addStudent').prop('disabled', true);
			$('#studentSubmit').prop('disabled', false);
			$('#deleteStudent').prop('disabled', false);
		} else {
			emptyStudent();
			$("#mainBus").show();
			$('#addStudent').prop('disabled', false);
			$('#studentSubmit').prop('disabled', true);
			$('#deleteStudent').prop('disabled', true);
		}
	});	
	
	$("#studentSubmit").click(function() {
		if ($("#studentID").val()) {
			//Variables are needed since the success function will be called after the values are changed
			sfirstName = $("#firstName").val();
			slastName = $("#lastName").val()
			
			$.ajax({
				url : "../controllers/Student/edit.php",
				type : "POST",
				data : {
					studentID : $("#studentID").val(),
					firstName : $("#firstName").val(),
					lastName  : $("#lastName").val(),
					pride : $("#pride").val(),
					homeTeacherID : $("#homeTeacherID").val()
				},
				success : function(response) {
					$("#studentStatus").html(sfirstName + " " + slastName + " was updated successfully in the database!");
				}
			});
			updateDropDowns($("#studentID").val());
			grabTable();
		} else {
			$("#firstName").val("");
			$("#lastName").val("");
			$("#pride").val("");
		}
	});
	
	$("#addStudent").click(function() {
		if (!$("#studentID").val() && $("#firstName").val() && $("#lastName").val() && $("#pride").val() && $("#homeTeacherID").val()) {
			alert("Button clicked");
			sfirstName = $("#firstName").val();
			sLastName = $("#lastName").val();
			spride = $("#pride").val();
			sbID = $("#homeBusID").val();
			stID = $("#homeTeacherID").val();
			$.ajax({
				url : "../controllers/Student/add.php",
				type : "POST",
				data : {
					firstName : sfirstName,
					lastName  : sLastName,
					pride : spride,
					busID : sbID,
					homeTeacherID : stID
				},
				success : function(response) {
					
					$("#studentStatus").html(sfirstName + " " + sLastName + " was added successfully in the database!");
					$.ajax({
						url : "../controllers/Student/options.php",
						success : function(response2) {
							emptyStudent();
							$("#studentID").html(response2);
							grabTables();
						}
					});
				}
			});
		} else {
			$("#studentStatus").html("Error: Make sure you leave the drop-down box empty and fill the other information in!");
		}
	});
	
	$("#deleteStudent").click(function() {
		if ($("#studentID").val()) {
			if(confirm("Are you sure you want to delete " + $("#firstName").val() + "?")) {
				$.ajax({
					url : "../controllers/Student/delete.php",
					type : "POST",
					data : {
						studentID : $("#studentID").val(),
					},
					success : function(response) {
						$.ajax({
							url : "../controllers/Student/options.php",
							success : function(response) {
								emptyStudent();
								$("#studentID").html(response);
								grabTables();
							}
						});
						$("#studentStatus").html(response);
						alert(response);
					}
				});
			}
		} else {
			$("#teacherStatus").html("Error: Make sure you choose a teacher to delete!");
		}
	});
	
	/*****************TEACHERS***********************/
	
	$("#teacherID").change(function() {
		if ($("#teacherID").val()) {
			updateTeacherDropDowns($(this).val());
			grabTables();
			
			$('#addTeacher').prop('disabled', true);
			$('#teacherSubmit').prop('disabled', false);
			$('#deleteTeacher').prop('disabled', false);
		} else {
			emptyTeacher();
			
			$('#addTeacher').prop('disabled', false);
			$('#teacherSubmit').prop('disabled', true);
			$('#deleteTeacher').prop('disabled', true);
		}
	});	
	
	$("#teacherSubmit").click(function() {
		if ($("#teacherID").val()) {
			tfirstName = $("#tfirstName").val();
			tLastName = $("#tlastName").val()
			$.ajax({
				url : "../controllers/Teacher/edit.php",
				type : "POST",
				data : {
					teacherID : $("#teacherID").val(),
					firstName : tfirstName,
					lastName  : tLastName,
					pride : $("#tpride").val(),
				},
				success : function(response) {
					$("#teacherStatus").html(tfirstName + " " + tLastName + " was updated successfully in the database!");
				}
			});
			
			updateTeacherDropDowns($("#teacherID").val());
			grabTables();
		} else {
			emptyTeacher();
		}
	});
	
	$("#addTeacher").click(function() {
		if (!$("#teacherID").val() && $("#tfirstName").val() && $("#tlastName").val() && $("#tpride").val()) {
			tfirstName = $("#tfirstName").val();
			tLastName = $("#tlastName").val();
			tpride = $("#tpride").val();
			$.ajax({
				url : "../controllers/Teacher/add.php",
				type : "POST",
				data : {
					firstName : tfirstName,
					lastName  : tLastName,
					pride : tpride,
				},
				success : function(response) {
					
					$("#teacherStatus").html(tfirstName + " " + tLastName + " was added successfully in the database!");
					$.ajax({
						url : "../controllers/Teacher/options.php",
						success : function(response) {
							emptyTeacher();
							$("#teacherID").html(response);
							$("#homeTeacherID").html(response);
							grabTables();
						}
					});
				}
			});
		} else {
			$("#teacherStatus").html("Error: Make sure you leave the drop-down box empty and fill the other information in!");
		}
	});
	
	$("#deleteTeacher").click(function() {
		if ($("#teacherID").val()) {
			if(confirm("Are you sure you want to delete this teacher?")) {
				$.ajax({
					url : "../controllers/Teacher/delete.php",
					type : "POST",
					data : {
						teacherID : $("#teacherID").val(),
					},
					success : function(response) {
						$.ajax({
							url : "../controllers/Teacher/options.php",
							success : function(response) {
								emptyTeacher();
								$("#teacherID").html(response);
								$("#homeTeacherID").html(response);
								grabTables();
							}
						});
						$("#teacherStatus").html(response);
						alert(response);
					}
				});
			}
		} else {
			$("#teacherStatus").html("Error: Make sure you choose a teacher to delete!");
		}
	});
	/*****************BUSES***********************/
	
	$("#busID").change(function() {
		if ($("#busID").val()) {
			updateBusDropDowns($(this).val());
			grabTables();
			
			$('#addBus').prop('disabled', true);
			$('#busSubmit').prop('disabled', false);
			$('#deleteBus').prop('disabled', false);
		} else {
			emptyBus();
			
			$('#addBus').prop('disabled', false);
			$('#busSubmit').prop('disabled', true);
			$('#deleteBus').prop('disabled', true);
		}
	});	
	
	$("#busSubmit").click(function() {
		if ($("#busID").val()) {
			bname = $("#busName").val();
			
			$.ajax({
				url : "../controllers/Bus/edit.php",
				type : "POST",
				data : {
					busID : $("#busID").val(),
					name : bname,
					lineOrder : $("#lineOrder").val(),
					driverName  : $("#driverName").val(),
					contactNum : $("#contactNum").val()
				},
				success : function(response) {
					$("#busStatus").html(bname + " was updated successfully in the database!");
				}
			});
			
			updateBusDropDowns($("#busID").val());
			grabTables();
		} else {
			emptyBus();
		}
	});
	
	$("#addBus").click(function() {
		if (!$("#busID").val() && $("#busIDInput").val() && $("#busName").val() && $("#lineOrder").val()) {
			bID = $("#busIDInput").val();
			bName = $("#busName").val();
			blineOrder = $("#lineOrder").val();
			bdriverName = $("#driverName").val();
			bcontactNum = $("#contactNum").val();
			$.ajax({
				url : "../controllers/Bus/add.php",
				type : "POST",
				data : {
					busID : bID,
					name : bName,
					lineOrder : blineOrder,
					driverName  : bdriverName,
					contactNum : bcontactNum
				},
				success : function(response) {
					$("#busStatus").html(bName + " was added successfully in the database!");
					$.ajax({
						url : "../controllers/Bus/options.php",
						success : function(response) {
							emptyBus();
							$("#busID").html(response);
							$("#homeBusID").html(response);
							grabTables();
						}
					});
				}
			});
		} else {
			$("#busStatus").html("Error: Make sure you leave the drop-down box empty and fill the other information in!");
		}
	});
	
	$("#deleteBus").click(function() {
		if ($("#busID").val()) {
			if(confirm("Are you sure you want to delete this bus?")) {
				$.ajax({
					url : "../controllers/Bus/delete.php",
					type : "POST",
					data : {
						busID : $("#busID").val(),
					},
					success : function(response) {
						$.ajax({
							url : "../controllers/Bus/options.php",
							success : function(response) {
								emptyBus();
								$("#busID").html(response);
								$("#homeBusID").html(response);
								grabTables();
							}
						});
						$("#busStatus").html(response);
						alert(response);
					}
				});
			}
		} else {
			$("#busStatus").html("Error: Make sure you choose a bus to delete!");
		}
	});
});

function updateDropDowns(studID) {
	newLast = "";
	newFirst = "";
	newPride = "";
	newTeach = 0;
	$("#lastName").val("Loading...");
	$("#firstName").val("Loading...");
	$("#pride").val("Loading...");
	
	$.ajax({
		url : "../controllers/Student/getStudent.php",
		dataType : "json",
		data : {
			studentID : studID
		},
		success : function(response) {
			newLast = response["lastName"];
			newFirst = response["firstName"];
			newPride = response["pride"];
			newTeach = response["homeTeacherID"];
			
			$("#lastName").val(newLast);
			$("#firstName").val(newFirst);
			$("#pride").val(newPride);
			$("#homeTeacherID").val(newTeach);
		}
	});
	
}

function updateTeacherDropDowns(teachID) {
	$("#teacherID").prop("disabled", true);
	$("#tlastName").val("Loading...");
	$("#tfirstName").val("Loading...");
	$("#tpride").val("Loading...");
	
	$.ajax({
		url : "../controllers/Teacher/getTeacher.php",
		dataType : "json",
		data : {
			teacherID : $("#teacherID").val()
		},
		success : function(response) {
			$("#teacherID").prop("disabled", false);
			$("#tlastName").val(response["lastName"]);
			$("#tfirstName").val(response["firstName"]);
			$("#tpride").val(response["pride"]);
			$("#teacherID option[value=" + $("#teacherID").val() + "]").html(response["lastName"] + ", " + response["firstName"]);
		}
	});
}

function updateBusDropDowns(busID) {
	$("#busID").prop("disabled", true);
	$("#busIDInput").val("Loading...");
	$("#busName").val("Loading...");
	$("#lineOrder").val("Loading...");
	$("#driverName").val("Loading...");
	$("#contactNum").val("Loading...");
	
	$.ajax({
		url : "../controllers/Bus/getBus.php",
		dataType : "json",
		data : {
			busID : $("#busID").val()
		},
		success : function(response) {
			$("#busID").prop("disabled", false);
			$("#busIDInput").val(response["busID"]);
			$("#busName").val(response["name"]);
			$("#lineOrder").val(response["lineOrder"]);
			$("#driverName").val(response["driverName"]);
			$("#contactNum").val(response["contactNum"]);
		}
	});
}

function grabTables() {
	grabTable();
	grabTeacherTable();
	grabBusTable();
}

function grabTable() {
	$.ajax({
		url : "../controllers/Student/list.php",
		success : function(response) {
			$("#stable").html(response);
			$("#studentTable").dataTable();
		}
	});
}

function grabTeacherTable() {
	$.ajax({
		url : "../controllers/Teacher/list.php",
		success : function(response) {
			$("#ttable").html(response);
			$("#teacherTable").dataTable();
		}
	});
}

function grabBusTable() {
	$.ajax({
		url : "../controllers/Bus/list.php",
		success : function(response) {
			$("#btable").html(response);
			$("#busTable").dataTable();
		}
	});
}

function emptyStudent() {
	$("#firstName").val("");
	$("#lastName").val("");
	$("#pride").val("");
}

function emptyTeacher() {
	$("#tlastName").val("");
	$("#tfirstName").val("");
	$("#tpride").val("");
}

function emptyBus() {
	$("#busIDInput").val("");
	$("#busName").val("");
	$("#lineOrder").val("");
	$("#driverName").val("");
	$("#contactNum").val("");
}