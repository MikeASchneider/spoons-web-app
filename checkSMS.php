
<ul>
<?php
include('lib/GoogleVoice.php');

$gv = new GoogleVoice('user', 'pass');

// get all new SMSs
$sms = $gv->getNewSMS();

$msgIDs = array();
foreach( $sms as $s )
{
        echo '<li>Message from: ' . $s['phoneNumber'] . ' on ' . $s['date'] . ' : ' . $s['message'] . '</li>';

		// handle request
		$command = preg_replace('/\W.*/','',$s['message']);
		
		switch ($command) {
		    case 'status':
		        echo 'status request';
				// TODO: query list of spooners
				// NOTE: no history is kept, so we only know about active participants, not inactive ones
				
				// return status of spooner
				//$gv->sendSMS($s['phoneNumber'], $camper . ' is still spoonable!');
		        break;
		    case 'spoon':
		        echo 'spooning request';
				// TODO: call to spooned.php
				
				// TODO: can we check if spooning was sucessful??
				
				// send SMS reply
				//$gv->sendSMS($s['phoneNumber'], $camper . ' has been spooned!');
		        break;
			default:
				// command unrecognised. send a helpful messge!!
				echo 'fail.';
				//$gv->sendSMS($s['phoneNumber'], 'YOU ARE A RETARD!');
		}

		// mark this message as read
		$gv->markSMSRead($s['msgID']);
}
?>

</ul>