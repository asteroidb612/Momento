<?php
	require 'db.php';
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	$start = $_POST['days'];
	$fid = $_POST['fid'];
	
	$mydb = New DB();
	
	
	$mydb->store_note($fid, $message, $start, $interval, $end);
?>