<?php
	require_once("../engine/class.core.php");
	header("Content-Type: application/json");
	
	$mResponse = array();
	
	$mFormAnswer = $_POST["formAnswer"];
	$mFormTicket = $_POST["formTicket"];
	$mFormCompleted = $_POST["formCompleted"];
	$mFormAnswerType = $_POST["formAnswerType"];
	
	global $systemHandler;
	$systemSession = &$systemHandler->getHandler("SESSION");
	
	if(strlen($mFormAnswer) > 0) {
		$systemExecution = &$systemHandler->getHandler("EXECUTION");
		
		$mAnswerName = null;
		if($systemSession->aliveSession("SUPPORTER") && $mFormAnswerType == 1) {
			$mAnswerName = $systemSession->getSession("SUPPORTER");
			$mAnswerSupport = 1;
		} else {
			$mAnswerName = $systemExecution->runQuery("SELECT ticket_user FROM web_conversations WHERE ticket_id = '%s'", $mFormTicket)->fetch_object()->ticket_user;
			$mAnswerSupport = 0;
		}
	
		$systemExecution->runQuery("INSERT INTO web_conversations (ticket_id, ticket_user, ticket_body, ticket_time, ticket_supporter) VALUES ('%s', '%s', '%s', '%s', '%s')", array($mFormTicket, $mAnswerName, $mFormAnswer, time(), $mAnswerSupport));
		$systemExecution->runQuery("UPDATE web_tickets SET ticket_status = '%s' WHERE ticket_id = '%s'", array($mFormCompleted == "true" ? 0 : 1, $mFormTicket));
		$mResponse["isValid"] = true;
		
		$mFormMail = $systemExecution->runQuery("SELECT ticket_mail FROM web_conversations WHERE ticket_id = '%s' ORDER BY id ASC LIMIT 1", $mFormTicket)->fetch_object()->ticket_mail;
		
		if($systemSession->aliveSession("SUPPORTER"))
			$systemHandler->getHandler("MAIL")->sendMailNewAnswer($mFormMail, $mFormTicket, vsprintf("%s: %s", array($mAnswerName, $mFormAnswer)));
	
	} else $mResponse["isValid"] = false;
	
	echo json_encode($mResponse);
?>