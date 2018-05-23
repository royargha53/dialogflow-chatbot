<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->result->parameters->text;

	switch ($text) {
		case 'ComEd Missing Meter Numbe':
			$speech = "Get the Missing Meter
     Numbers from DMD report.
 Validate and filter out
     the meters which are not exist in MDM.
 Get the meter details
     from CIMS using meter and send out mail to Tim.
 Once Tim flip it to
     standard meter Create HPSM ticket.";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry";
			break;
	}

	$response = new \stdClass();
	$response->speech = "$speech";
	$response->displayText = "$speech";
	$response->source = 'source-of-the-response';
	$response->return = "$speech";
	$response->fulfillmentText = "$speech";
	echo json_encode($response);
}
else
{
	$speech = "Ok";
	$response->speech = "$speech";
	echo json_encode($response);
}

?>
