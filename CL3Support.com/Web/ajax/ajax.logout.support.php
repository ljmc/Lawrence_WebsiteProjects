<?php
	require_once("../engine/class.core.php");
	header("Content-Type: application/json");
	
	$mResponse = array();
	
	$mAuthCode = $_POST["formAuthCode"];
	
	global $systemHandler;
	$systemHandler->getHandler("SESSION")->destroySessions();
	
	echo json_encode($mResponse);
?>