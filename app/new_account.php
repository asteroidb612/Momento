<?php
	require 'db.php';
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	$pnum = $_POST['phone_number'];
	
	$mydb = New DB();
	
	$mydb->new_account($name, $password, $pnum);
?>