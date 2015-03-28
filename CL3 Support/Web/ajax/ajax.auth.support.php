<?php
	require_once("../engine/class.core.php");
	header("Content-Type: application/json");
	
	$mResponse = array();
	
	$mAuthCode = $_POST["formAuthCode"];
	
	global $systemHandler;
	$systemExecution = &$systemHandler->getHandler("EXECUTION");
	$mResponse["isValid"] = $systemExecution->runQuery("SELECT COUNT(id) AS supporterCount FROM web_supporter WHERE auth_code = '%s'", $mAuthCode)->fetch_object()->supporterCount == 1 ? true : "Invalid authentication code";
	
	if($mResponse["isValid"] == true) {
		// Activate the new session!
		$systemSession = &$systemHandler->getHandler("SESSION");
		$systemSession->addSession("SUPPORTER", $systemExecution->runQuery("SELECT auth_name FROM web_supporter WHERE auth_code = '%s'", $mAuthCode)->fetch_object()->auth_name);
		$systemSession->addSession("CSRFTOKEN", rand(1000, 9999).'-'.rand(1000, 9999).'-'.rand(1000, 9999).'-'.rand(1000, 9999));
	}
	
	echo json_encode($mResponse);
?>