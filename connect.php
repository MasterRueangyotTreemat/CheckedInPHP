<?php
	$con = mysql_connect("localhost","root",""); // connect to database

	mysql_select_db("checkedin",$con); // database name

	mysql_query("SET NAMES uft8"); 
?>