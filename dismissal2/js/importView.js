$(document).ready(function() {
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
	
	$.ajax({
		url : "../controllers/Teacher/list.php",
		success : function(response) {
			$("#teacherTable").html(response);
		}
	});
	
	$('#teacherToggle').click(function() {
		$('#teacherTable').toggle();
	});
	
	$.ajax({
		url : "../controllers/Bus/list.php",
		success : function(response) {
			$("#busTable").html(response);
		}
	});
	
	$('#studentToggle').click(function() {
		$('#studentTable').toggle();
	});
	
	$.ajax({
		url : "../controllers/Student/list.php",
		success : function(response) {
			$("#studentTable").html(response);
		}
	});
	
	$('#busToggle').click(function() {
		$('#busTable').toggle();
	});
	
	
	$('#statusToggle').click(function() {
		$('#Status').toggle();
	});
});