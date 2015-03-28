<?php
	require_once("system.mail/PHPMailerAutoload.php");
	class systemMAIL {
		private $mMailer;
		
		public function __construct() {
			$this->mMailer = new PHPMailer();
		}
		
		public function sendMailWelcome($mReceiver, $mTicketId) {
			global $systemHandler;
			$systemConfig = &$systemHandler->getHandler("CONFIG");
			
			$this->mMailer->isSMTP();
			$this->mMailer->Host = $systemConfig->mSMTPServer;
			$this->mMailer->SMTPAuth = true;
			$this->mMailer->Username = $systemConfig->mSenderEmail;
			$this->mMailer->Password = $systemConfig->mSenderPass;
			$this->mMailer->SMTPSecure = 'tls';
			$this->mMailer->Port = $systemConfig->mSMTPPort;
			$this->mMailer->isHTML(true);
			
			$this->mMailer->From =  $systemConfig->mSenderEmail;
			$this->mMailer->FromName =  $systemConfig->mSenderName;
			$this->mMailer->addAddress($mReceiver);
			
			$this->mMailer->Subject = "Your ticket has been created! - ".$mTicketId;
			$this->mMailer->Body = "Hello,<br/><br/>Your ticket has been created and sent to our helpers.<br /><br />Your ticket-id is: <b>".$mTicketId."</b><br /><br />While you wait, why not check out the following resources. You might be able to find the answer there!<br/><br/>The Cliki: https://cliki.cityliferpg.com/index.php?title=Main_Page <br/><br/>The Forums: https://forum.cityliferpg.com/forum/11-need-help/ <br/><br/><br/><br/>You can check the status of your ticket whenever you want on our website https://CL3Support.com . Just enter the ticket-id we've sent to you and look up the answer from our support. You will also receive an email update when a helper has answered your ticket.";
			$this->mMailer->send();
		}
		
		public function sendMailNewAnswer($mReceiver, $mTicketId, $mTicketAnswer) {
			global $systemHandler;
			$systemConfig = &$systemHandler->getHandler("CONFIG");
			
			$this->mMailer->isSMTP();
			$this->mMailer->Host = $systemConfig->mSMTPServer;
			$this->mMailer->SMTPAuth = true;
			$this->mMailer->Username = $systemConfig->mSenderEmail;
			$this->mMailer->Password = $systemConfig->mSenderPass;
			$this->mMailer->SMTPSecure = 'tls';
			$this->mMailer->Port = $systemConfig->mSMTPPort;
			$this->mMailer->isHTML(true);
			
			$this->mMailer->From =  $systemConfig->mSenderEmail;
			$this->mMailer->FromName =  $systemConfig->mSenderName;
			$this->mMailer->addAddress($mReceiver);
			
			$this->mMailer->Subject = "Your ticket has a new answer - ".$mTicketId;
			$this->mMailer->Body = "Hello,<br/><br/>A Helper has added a possible solution to your ticket!<br /><br />Here is what they said:<br /><b>".htmlspecialchars($mTicketAnswer)."</b><br /><br />Your ticket-id is: <b>".$mTicketId."</b><br /><br />You can check the status of your ticket whenever you want on our website https://CL3Support.com . Just enter the ticket-id we've sent to you and look up the answer from our support. You will also receive an email update when a helper has answered your ticket.";
			$this->mMailer->send();
		}
	}
?>