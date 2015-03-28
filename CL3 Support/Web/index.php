<?php
require_once("engine/class.core.php");
	$mOnline = $systemHandler->getHandler("SESSION")->aliveSession("SUPPORTER");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CL3 Support</title>
		<!-- Sets initial viewport load and disables zooming  -->
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="shortcut icon" href="favicon.ico"/>
		<link rel="bookmark" href="favicon.ico"/>
		<!-- site css -->
		<link rel="stylesheet" href="assets/css/site.min.css">
		<link rel="stylesheet" href="assets/css/sweet-alert.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
		<!-- <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="assets/js/site.min.js"></script>
	</head>
	<body style="background-color: #f1f2f6;">
		<div class="docs-header">
			<!--nav-->
			<nav class="navbar navbar-default navbar-custom" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" height="40"></a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="nav-link" href="support.php">Helpers</a></li>
							<li><a class="nav-link" href="faq.php">FAQ</a></li>
							<li><a class="nav-link current" href="index.php">Home</a></li>
							<?php if($mOnline) { ?>
							<li><a class="nav-link logoutSupporter" href="javascript:;"><b>Logout</b></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
			<!--header-->
			<div class="topic">
				<div class="container">
					<div class="col-md-8">
						<h3>Welcome to City Life 3 Support Center</h3>
						<h4>Feel free to create a ticket to contact our helpers.</h4>
					</div>
					<div class="col-md-4"></div>
				</div>
				<div class="topic__infos">
					<div class="container"></div>
				</div>
			</div>
		</div>
		
		<div class="container documents">
			<div class="row">
				<div class="col-md-4">
					<p class="lead">Welcome to our ticket system!</p>
					It's really simple, just create on the right side a ticket to contact us or simply follow your current ticket at the "<b>Follow an open ticket</b>" tab!
					<br /><br />
					Please note that all helpers are volunteers and sometimes may take some time to respond. 
				</div>
				
				<div class="col-md-8">
					<div style="background-color: white; padding: 10px; border-radius: 6px">
						<div class="tabbable-line">
							<ul class="nav nav-tabs ">
								<li class="active"><a href="#createTicket" data-toggle="tab">Create a new ticket</a></li>
								<li><a href="#followTicket" data-toggle="tab">Follow an open ticket</a></li>
							</ul>
							<div id="myTabContent" class="tab-content" style="min-height: 260px">
							<div class="tab-pane fade active in" id="createTicket">
								<div id="submitTicketForm" class="row">
									<div class="col-md-10 col-md-offset-1">
												<div class="row">
													<div class="col-xs-6">
														<label>What is your forum username?</label>
														<input id="submitTicketName" type="text" class="form-control" maxlength="25" placeholder="John Doe">
													</div>
													<div class="col-xs-6">
														<label>Email</label>
														<input id="submitTicketMail" type="text" class="form-control" maxlength="30" placeholder="help@cl3support.com">
													</div>
												</div>
													<br />
												<div class="row">
													<div class="col-xs-12">
														<label>What is your issue?</label>
														<textarea id="submitTicketBody" maxlength="500" class="form-control" placeholder="My launcher is saying Bad Name Character Removed. Here is a screenshot: http://imgur.com" rows="3"></textarea>
													</div>
												</div>
													<br />
												<div class="row">
													<div class="col-xs-7">
														<div id="mErrorBody" class="row" style="display: none; color: darkred">
															<div class="col-md-1"><i style="font-size: 20px" class="glyphicon glyphicon-warning-sign"></i></div>
															<div id="mErrorText" class="col-md-11" style="text-align: left"></div>
														</div>
													</div>
													
													<div class="col-xs-3">
														<div class="input-group">
															<span class="input-group-addon" id="mCaptchaMath">2 + 2 =</span>
															<input id="mCaptchaResult" style="text-align: center" type="text" class="form-control">
														</div>
													</div>
													
													<div class="col-xs-2">
														<a id="submitTicket" class="btn btn-primary">Submit</a>
													</div>
												</div>
									</div>
								</div>
								
								<div id="submitTicketFormDone" style="display: none">
									<center>
										<div class="row" style="padding-top: 4%">
											<div class="col-xs-12">
												<i class="glyphicon glyphicon-ok" style="font-size: 64px"></i>
													<br />
												<h3>Your ticket has been submitted</h3>
												<h4 id="ticketNumber"></h4>
											</div>
										</div>
									</center>
								</div>
							</div>
								<div class="tab-pane fade" id="followTicket">
									<div id="loadTicketContainer" class="row">
										<div class="col-md-10 col-md-offset-1">
											<div id="mLoadTicketRow" style="padding-top: 14%">
												<label>Type in your current ticket number to check the current status.</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i> </span>
													<input id="mLoadTicketNumber" style="text-align: center" type="text" class="form-control">
													<span class="input-group-btn">
														<button id="mLoadTicket" type="submit" class="btn" data-type="last">Check Status</button>
													</span>
												</div>
												<br />
												<center style="display: none; color: #3BAFDA;" id="mLoadingTicket">
													<div class="row">
														<div class="col-md-1 col-md-offset-4"><i style="font-size: 22px" class="glyphicon glyphicon-cloud"></i></div>
														<div class="col-md-3" style="text-align: left">
															Loading ticket..
														</div>
													</div>
												</center>
												<center style="display: none; color: red;" id="mNotFound">
													<div class="row">
														<div class="col-md-1 col-md-offset-4"><i style="font-size: 22px" class="glyphicon glyphicon-warning-sign"></i></div>
														<div class="col-md-3" style="text-align: left">
															No ticket found
														</div>
													</div>
												</center>
											</div>
										</div>
									</div>
									
									<div id="loadedTicketContainer" style="display: none"></div>
									<div id="ticketAnswerContainer" style="display: none">
										<hr>
										<div class="row">
											<div class="col-xs-12">
												<textarea id="submitText" rows="2" class="form-control"></textarea>
											</div>
										</div>
											<br>
										<div class="row">
											<div class="col-xs-1">
												<label class="toggle">
													<input id="checkboxCompleted" type="checkbox">
													<span class="handle"></span>
												</label>
											</div>
											
											<div class="col-xs-4">
												<p class="lead">Close ticket</p>
											</div>
											
											<div class="col-xs-2 col-xs-offset-5">
												<a id="submitInvoke" class="btn btn-success" style="float: right">Submit</a>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
				<br />
    <div class="well">
      <center>Copyright &copy; 2013 City Life RPG. All rights reserved. <a href="http://www.copyrightservice.co.uk/" onclick="window.open('https://copyrightservice.co.uk/');return false" title="Registered with the UK Copyright Service">Registered with the UK Copyright Service. Registration No: 284659128</a><br></center>
    </div>
		</div>
		
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery-1.10.1.min.js"></script>
		<script src="assets/js/sweet-alert.js"></script>
        <script src="assets/js/submit.js"></script>
	</body>
</html>