<?php
	require_once("../engine/class.core.php");
	header("Content-Type: application/json");
	
	$mResponse = array();
	
	global $systemHandler;
	$systemSession = &$systemHandler->getHandler("SESSION");
	
	$mLoadTypes = array(0, 1, 2);
	$mLoadType = $_POST["loadType"];
	
	if(!in_array($mLoadType, $mLoadTypes))
		exit();
	
	if($systemSession->aliveSession("SUPPORTER")) {
		$mResponse["ticketOverviewHTML"] = null;
		
		$systemExecution = &$systemHandler->getHandler("EXECUTION");
		$mDataCollection = $systemExecution->runQuery("SELECT * FROM web_tickets WHERE ticket_status = '%s'", $mLoadType);
		while($mRow = $mDataCollection->fetch_assoc()) {
			$mTicketData = $systemExecution->runQuery("SELECT * FROM web_conversations WHERE ticket_id = '%s'", $mRow["ticket_id"])->fetch_assoc();
			$mResponse["ticketOverviewHTML"] .= "<a href=\"#\" ticket-id=\"".$mRow["ticket_id"]."\" class=\"ticketRow list-group-item\"><span class=\"badge badge-".($mRow["ticket_status"] == 0 ? "success" : ($mRow["ticket_status"] == 1 ? "primary" : ($mRow["ticket_status"] == 2 ? "danger" : "warning")))."\"><i class=\"glyphicon glyphicon-".($mRow["ticket_status"] == 0 ? "ok" : ($mRow["ticket_status"] == 1 ? "time" : ($mRow["ticket_status"] == 2 ? "asterisk" : "user")))."\"></i></span>".htmlspecialchars($mTicketData["ticket_user"])." - ".date("d.m.Y H:i:s", $mTicketData["ticket_time"])."</a>";
		}
		
		if($systemExecution->runQuery("SELECT COUNT(id) as ticketCount FROM web_tickets WHERE ticket_status = '%s'", $mLoadType)->fetch_object()->ticketCount == 0)
			$mResponse["ticketOverviewHTML"] = "<center>There are currently no tickets.</center>";
	}
	
	echo json_encode($mResponse);
?>