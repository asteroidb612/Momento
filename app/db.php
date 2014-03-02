<?php

include_once 'constants.php';

class DB{
	var $connection;
	
	/*	Function:		createDB 
	 *	Parameters:		<none>
	 *	Returns:			phpDBO Object
	 *	author:			issiah
	 *
	 *	This function will instantiate the $connection
	 *	variable or die trying.
	 */
	function DB(){
		try{
			$this->connection = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME,DB_USER,DB_PASS);
		
			$this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die("Error Connecting to Database");
		}
	}
	
	
	function store_note($fid, $message, $days){
		$queryText = 'INSERT INTO Notes (message, days, next_time, fid) 
		VALUES (:message, :days, DATE_ADD(CURDATE(), INTERVAL :days DAY), :fid)';
		
		$query = $this->connection->prepare($queryText);
		$query->execute(array(':message'=>$message, ':days'=>$days, ':fid'=>$fid));
	}
	
	
	function edit_note($id, $message, $days){
		$queryText = 'UPDATE Notes SET message=:message,
		next_time=DATE_ADD(CURDATE(), INTERVAL :days DAY),
		WHERE id=:id';
		
		$query = $this->connection->prepare($queryText);
		$query->execute(array(, ':days'=>$dyas, ':message'=>$message, ':id'=>$id));
	}
	
	function new_account($name, $password, $pnumber){
		$queryText = 'INSERT INTO Users (name, password, phone_number) 
		VALUES (:name, :password, :phone_number)';
		
		$query = $this->connection->prepare($queryText);
		$query->execute(array(':name'=>$name, ':password'=>$password, ':phone_number'=>$pnumber));
	}
	
	function get_notes($fid){
		$queryText = 'SELECT Notes.id, Notes.message, Notes.next_time, Notes.days
		FROM Notes WHERE Notes.fid = :fid';
		
		$query = $this->connection->prepare($queryText);
		$query->execute(array(':fid'=>$fid));
		
		return $query;
	}
	
	function get_all_notes(){
		$queryText = 'SELECT Notes.message, Notes.next_time,  User.phone_number 
		FROM Notes INNER JOIN  Users ON Users.uid = Notes.fid';
		
		$query = $this->connection->prepare($queryText);
		$query->execute(array());
		
		return $query;
	}
	
	
	function set_next_note_time($days, $id){
		if($next_time <= $end_time){	
			$queryText = 'UPDATE Notes SET next_time = 
			DATE_ADD(next_time, INTERVAL :days DAY) WHERE id=:id';
			
			$query = $this->connection->prepare($queryText);
			$query->execute(array(':days'=>$days, ':id'=>$id));
		}
	}
}

?>
