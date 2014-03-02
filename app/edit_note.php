<?php
	require 'db.php';

	$message = $_POST['message'];
	$start = $_POST['days'];
	
	$mydb = New DB();
	
	
	$mydb->edit_note($id, $message, $days);
	
?>