<?php
	require_once("../engine/class.core.php");
	header("Content-Type: application/json");
	
	$mResponse = array();
	
	$mFormName = trim($_POST["formName"]);
	$mFormMail = trim($_POST["formMail"]);
	$mFormBody = trim($_POST["formBody"]);
	
	$mResponse["isValid"] = strlen($mFormName) > 0 && strlen($mFormMail) > 0 && strlen($mFormBody) > 0 ? (filter_var($mFormMail, FILTER_VALIDATE_EMAIL) ? true : "Your email address is invalid") : "You have to fill out all fields";
	
	if(strlen($mFormName) > 0 && strlen($mFormMail) > 0 && strlen($mFormBody) > 0) {
		if(filter_var($mFormMail, FILTER_VALIDATE_EMAIL)) {
			global $systemHandler;
			$systemExecution = &$systemHandler->getHandler("EXECUTION");
			while(true) {
				$mTicketOne = rand(1000, 9999);
				$mTicketTwo = rand(1000, 9999);
				$mTicketThree = rand(1000, 9999);
				$mTicketFour = rand(1000, 9999);
				
				$mResponse["ticketOne"] = $mTicketOne;
				$mResponse["ticketTwo"] = $mTicketTwo;
				$mResponse["ticketThree"] = $mTicketThree;
				$mResponse["ticketFour"] = $mTicketFour;
				
				$mTicketNumber = $mTicketOne.'-'.$mTicketTwo.'-'.$mTicketThree.'-'.$mTicketFour;
				
				if($systemExecution->runQuery("SELECT COUNT(id) AS ticketCount FROM web_tickets WHERE ticket_id = '%s'", $mTicketNumber)->fetch_object()->ticketCount == 0) {
					$systemExecution->runQuery("INSERT INTO web_tickets (ticket_id, ticket_status) VALUES ('%s', '%s')", array($mTicketNumber, 2));
					$systemExecution->runQuery("INSERT INTO web_conversations (ticket_id, ticket_user, ticket_mail, ticket_body, ticket_time) VALUES ('%s', '%s', '%s', '%s', '%s')", array($mTicketNumber, $mFormName, $mFormMail, $mFormBody, time()));
					$mResponse["ticketNumber"] = $mTicketNumber;
					$systemHandler->getHandler("MAIL")->sendMailWelcome($mFormMail, $mTicketNumber);
					break;
				}
			}
		} else $mResponse["isValid"] = "Your email address is invalid";
	} else $mResponse["isValid"] = "You have to fill out all fields";
	
	echo json_encode($mResponse);
?>