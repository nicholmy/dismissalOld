<?php
	#Supposed to be a template for connecting to the database, 
	#but can't seem to get it to work.
	
	#Connect to MYSQL
	$conn = mysqli_connect("mysql.mylesnicholson.com", "mnichols", "Yumyum92!!!");
				
	#Select the database
	$rs = mysqli_select_db($conn, "dismissal") or die(''.mysqli_error());
?>