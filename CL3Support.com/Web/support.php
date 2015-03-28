<?php
	require_once("engine/class.core.php");
	$mOnline = $systemHandler->getHandler("SESSION")->aliveSession("SUPPORTER");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CL3 - Support Dashboard</title>
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
							<li><a class="nav-link current" href="support.php">Helpers</a></li>
							<li><a class="nav-link" href="faq.php">FAQ</a></li>
							<li><a class="nav-link" href="index.php">Home</a></li>
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
						<h3>Support Center</h3>
						<h4>If you are a helper you're able to manage open tickets here. If you do not have a helper ID please contact a Head Helper to receive your ID.</h4>
					</div>
					<div class="col-md-4">
						<div class="advertisement">
							
							<div class="panel panel-primary">
								<div class="panel-heading">Helper ID</div>
								<div class="panel-body">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
										<input id="mAuthCode" style="text-align: center" type="text" class="form-control">
										<span class="input-group-btn">
										<button id="mAuthLogin" type="submit" class="btn" data-type="last">Submit</button>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="topic__infos">
					<div class="container">
					</div>
				</div>
			</div>
		</div>
		<div class="container documents">
			<?php if($mOnline) { ?>
				<div id="ticketDashboard" class="row">
					<div class="col-xs-5">
						<!-- ticket overview -->
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">List of tickets</h3>
							</div>
							<div class="panel-body" style="max-height: 500px">
								<div class="tabbable-panel">
									<div class="tabbable-line">
										<ul class="nav nav-tabs ">
											<li class="active"><a href="#tab_default_1" data-toggle="tab"><i class="glyphicon glyphicon-asterisk"></i> New</a></li>
											<li><a href="#tab_default_2" data-toggle="tab"><i class="glyphicon glyphicon-time"></i> Waiting</a></li>
											<li><a href="#tab_default_3" data-toggle="tab"><i class="glyphicon glyphicon-ok"></i> Completed</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_default_1">
												<ul style="overflow: auto; max-height: 360px" id="ticketOverviewNew" class="list-group"></ul>
											</div>
											<div class="tab-pane" id="tab_default_2">
												<ul style="overflow: auto; max-height: 360px" id="ticketOverviewWaiting" class="list-group"></ul>
											</div>
											<div class="tab-pane" id="tab_default_3">
												<ul style="overflow: auto; max-height: 360px" id="ticketOverviewCompleted" class="list-group"></ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="well col-xs-7">
						<!-- ticket body -->
						<div id="loadedTicketContainer">
							<center>
								<h3>Welcome to the ticket dashboard</h3>
								<br />
								<p class="lead">The tickets are shown on the left side.</p>
							</center>
						</div>
						<div id="ticketAnswerContainer" style="display: none">
							<hr />
							<div class="row">
								<div class="col-xs-12">
									<textarea id="submitText" rows="2" class="form-control"></textarea>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col-xs-1">
									<label class="toggle">
									<input id="checkboxCompleted" type="checkbox">
									<span class="handle"></span>
									</label>
								</div>
								<div class="col-xs-7">
									<p class="lead">Close ticket</p>
								</div>
								<div class="col-xs-2 col-xs-offset-2">
									<a id="submitInvoke" class="btn btn-success" style="float: right">Submit</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
    <div class="well">
      <center>Copyright &copy; 2013 City Life RPG. All rights reserved. <a href="http://www.copyrightservice.co.uk/" onclick="window.open('https://copyrightservice.co.uk/');return false" title="Registered with the UK Copyright Service">Registered with the UK Copyright Service. Registration No: 284659128</a><br></center>
    </div>
		</div>

		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery-1.10.1.min.js"></script>
		<script src="assets/js/sweet-alert.js"></script>
		<script type="text/javascript">
			<?php global $systemHandler; if($systemHandler->getHandler("SESSION")->aliveSession("SUPPORTER")) { ?>
				loadTickets();
				
				$(".advertisement").remove();
			<?php } ?>
			
			function loadTickets() {
				$.ajax({
					url: "ajax/ajax.load.tickets.php",
					type: "POST",
					data: { loadType: 0 },
					dataType: "JSON",
					success: function(jr) {
						$("#ticketOverviewCompleted").html(jr.ticketOverviewHTML);
					}
				});
				
				$.ajax({
					url: "ajax/ajax.load.tickets.php",
					type: "POST",
					data: { loadType: 1 },
					dataType: "JSON",
					success: function(jr) {
						$("#ticketOverviewWaiting").html(jr.ticketOverviewHTML);
					}
				});
				
				$.ajax({
					url: "ajax/ajax.load.tickets.php",
					type: "POST",
					data: { loadType: 2 },
					dataType: "JSON",
					success: function(jr) {
						$("#ticketOverviewNew").html(jr.ticketOverviewHTML);
					}
				});
			}
			
			var mError = false;
			$("#mAuthLogin").live("click", function () {
				var mAuthCode = $("#mAuthCode").val();
				$.ajax({
					url: "ajax/ajax.auth.support.php",
					type: "POST",
					data: { formAuthCode: mAuthCode },
					dataType: "JSON",
					success: function(jr) {
						if(jr.isValid == true) {
							swal({
								title: "Welcome back!",
								text: "You're now logged in as supporter.",
								type: "success",
								showCancelButton: false
							}, function () {
								location.reload();
							});
						}
						else swal("Oops!", jr.isValid, "error");
					}
				});
			});
			
			var mLastTicketNumber;
			$(".ticketRow").live("click", function () {
				var mTicketNumber = $(this).attr("ticket-id");
				mLastTicketNumber = mTicketNumber;
				$("#ticketAnswerContainer").fadeOut();
				$("#loadedTicketContainer").fadeOut(function () {
					$.ajax({
						url: "ajax/ajax.load.ticket.php",
						type: "POST",
						data: { formTicketNumber: mTicketNumber },
						dataType: "JSON",
						success: function(jr) {
							if(jr.isValid == true) {
								$("#loadedTicketContainer").html("<center><h4>Ticket-ID: <span class=\"label label-default\">" + mTicketNumber + "</span></h4></center><hr />" + jr.htmlContent).fadeIn();
								
								if(jr.ticketStatus > 0)
									$("#ticketAnswerContainer").fadeIn();
									
							}
						}
					});
				});
			});
			
			$("#submitInvoke").live("click", function () {
				var mTicketNumber = mLastTicketNumber;
				var mAnswerText = $("#submitText").val();
				var mCompleted = $("#checkboxCompleted").attr("checked") == "checked";
				
				$.ajax({
					url: "ajax/ajax.submit.answer.php",
					type: "POST",
					data: { formAnswer: mAnswerText, formTicket: mTicketNumber, formCompleted: mCompleted, formAnswerType: 1 },
					dataType: "JSON",
					success: function(jr) {
						if(jr.isValid == true) {
							$.ajax({
								url: "ajax/ajax.load.ticket.php",
								type: "POST",
								data: { formTicketNumber: mTicketNumber },
								dataType: "JSON",
								success: function(jr) {
									if(jr.isValid == true) {
										$("#submitText").val("");
										loadTickets();
										$("#loadedTicketContainer").html("<center><h4>Ticket-ID: <u>" + mTicketNumber + "</u></h4></center><hr />" + jr.htmlContent).fadeIn();
										$("#ticketAnswerContainer").fadeIn();
										
										if(mCompleted)
											$("#ticketAnswerContainer").fadeOut();
									} else {
											
									}
								}
							});
						} else {
							
						}
					}
				});
			});
			
			$(".logoutSupporter").click(function () {
				$.ajax({
					url: "ajax/ajax.logout.support.php",
					type: "POST",
					dataType: "JSON",
					data: { },
					success: function(jr) {
						swal({
							title: "Alright!",
							text: "You've been signed out!",
							type: "success",
							showCancelButton: false
						}, function () {
							top.location = "";
						});
					}
				});
			});
		</script>
	</body>
</html>