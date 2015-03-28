<?php
	require_once("../engine/class.core.php");
	header("Content-Type: application/json");
	
	$mResponse = array();
	
	$mFormTicketNumber = $_POST["formTicketNumber"];
	
	$mResponse["isValid"] = strlen($mFormTicketNumber) > 0 ? true : "You have to fill out all fields";
	
	if($mResponse["isValid"] == true) {
		global $systemHandler;
		$systemExecution = &$systemHandler->getHandler("EXECUTION");
		$mResponse["htmlContent"] = "<div class=\"timeline\"><dl><dt>Ticket overview</dt>";
		if($systemExecution->runQuery("SELECT COUNT(id) as ticketCount FROM web_conversations WHERE ticket_id = '%s'", $mFormTicketNumber)->fetch_object()->ticketCount > 0) {
			$mDataCollection = $systemExecution->runQuery("SELECT * FROM web_conversations WHERE ticket_id = '%s'", $mFormTicketNumber);
			while($mRow = $mDataCollection->fetch_assoc()) {
				$mResponse["htmlContent"] .= "
								<dd class=\"pos-".($mRow["ticket_supporter"] == 1 ? "right" : "left")." clearfix\">
									<div class=\"circ\"></div>
									<div class=\"time\">".date("d.m.Y", $mRow["ticket_time"])."<br />".date("H:i", $mRow["ticket_time"])."</div>
									<div class=\"events\">
										<div class=\"events-body\">
											<h4 class=\"events-heading\">".($mRow["ticket_supporter"] == 1 ? "<i class=\"glyphicon glyphicon-asterisk\"></i>" : null)." ".htmlspecialchars($mRow["ticket_user"])."</h4>
											<p class=\"messageBubble\">".htmlspecialchars($mRow["ticket_body"])."</p>
										</div>
									</div>
								</dd>";
			}
			$mResponse["htmlContent"] .= "</dl></div>";
			$mResponse["ticketStatus"] = $systemExecution->runQuery("SELECT ticket_status FROM web_tickets WHERE ticket_id = '%s'", $mFormTicketNumber)->fetch_object()->ticket_status;
		} else $mResponse["isValid"] = false;
	}
	
	echo json_encode($mResponse);
?>