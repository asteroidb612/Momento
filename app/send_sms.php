<?php
require "Services/Twilio.php";
require "constants.php";

$mydb = New DB();
$notes = $mydb->get_notes();


$AccountSid = "AC3dd3fd25e9ddf6e888a48dab5cd4ebd8";
$AuthToken = "c9750e544db3f14d8ba003988b7c1ec7";

$client = new Services_Twilio($AccountSid, $AuthToken);

while ($row = $notes->fetch(PDO::FETCH_ASSOC)) {
	if(date_diff($row['next_time'])->format('%a') == DateTime("now"))->format('%a')){

		$sms = $client->account->messages->sendMessage(

		"510-924-0708",

		$row['Users.phone_number'],

		$row['Notes.message']
		);
		
		$mydb->set_next_note_time($row['days'], $row['id']);
	}
}


?>