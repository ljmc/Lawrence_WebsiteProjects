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
		<link rel="stylesheet" type="text/css" href="administrator/faq/css/faq.css">
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
							<li><a class="nav-link current" href="faq.php">FAQ</a></li>
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
						<h3>Common City Life 3 Issues</h3>
						<h4>Here are some common issues that you might have. Please take a look at them before submitting a ticket.</h4>
					</div>
					<div class="col-md-4"></div>
				</div>
				<div class="topic__infos">
					<div class="container"></div>
				</div>
			</div>
		</div>
						<div class="sectionWrapper">
					<div class="container">
						<div class="row">
			<?php 
				require_once('administrator/faq/include/faq.class.php');
				$faq = new Faq();
				echo $faq->showFaq();
			?>
			<a href="#" class="back-to-top">Back to top</i></a>

    <div class="well">
      <center>Copyright &copy; 2013 City Life RPG. All rights reserved. <a href="http://www.copyrightservice.co.uk/" onclick="window.open('https://copyrightservice.co.uk/');return false" title="Registered with the UK Copyright Service">Registered with the UK Copyright Service. Registration No: 284659128</a><br></center>
    </div>
		</div>
		
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery-1.10.1.min.js"></script>
		<script src="assets/js/sweet-alert.js"></script>
		<script type="text/javascript">
			var mFirstNumber = Math.floor((Math.random() * 15) + 1);
			var mSecondNumber = Math.floor((Math.random() * 15) + 1);
			var mMath = mFirstNumber + " + " + mSecondNumber + " =";
			$("#mCaptchaMath").html(mMath);
		
			var mLastTicketNumber;
			$("#mLoadTicket").click(function() {
				$("#mNotFound").fadeOut(function () {
					$("#mLoadingTicket").fadeIn();
				});
				
				$("#mLoadTicketNumber").addClass("disabled");
				$("#mLoadTicketNumber").attr("disabled", "disabled");
				$("#mLoadTicketRow").css("padding-top", "12%");
				var mTicketNumber = $("#mLoadTicketNumber").val();

				$.ajax({
					url: "ajax/ajax.load.ticket.php",
					type: "POST",
					data: { formTicketNumber: mTicketNumber },
					dataType: "JSON",
					success: function(jr) {
						if(jr.isValid == true) {
							$("#loadTicketContainer").fadeOut(function () {
								$("#loadedTicketContainer").html(jr.htmlContent).fadeIn();
								
								if(jr.ticketStatus > 0)
									$("#ticketAnswerContainer").fadeIn();
									
								mLastTicketNumber = mTicketNumber;
							});
						} else {
							$("#mLoadTicketNumber").removeClass("disabled");
							$("#mLoadTicketNumber").removeAttr("disabled");
							$("#mLoadTicketRow").css("padding-top", "14%");
							
							$("#mLoadingTicket").fadeOut(function () {
								swal("Oops!", "There is no ticket with this identification.", "warning");
							});
						}
					}
				});
			});
			
			function changeButton(mNormal) {
				if(mNormal == true) {
					$("#submitTicket").removeAttr("disabled");
					$("#submitTicket").html("Submit");
				}
				else {
					$("#submitTicket").attr("disabled", "disabled");
					$("#submitTicket").html("Loading...");
				}
			}
			
			$("#submitTicket").click(function () {
				changeButton(false);
				
				var mName = $("#submitTicketName").val();
				var mMail = $("#submitTicketMail").val();
				var mBody = $("#submitTicketBody").val();
				if($("#mCaptchaResult").val() == (mFirstNumber + mSecondNumber)) {
					$.ajax({
						url: "ajax/ajax.submit.ticket.php",
						type: "POST",
						data: { formName: mName, formMail: mMail, formBody: mBody },
						dataType: "JSON",
						success: function(jr) {
							if(jr.isValid == true) {
								$("#submitTicketForm").fadeOut(function () {
									swal("Alright!", "Your ticket has been submitted!", "info");
									$("#submitTicketFormDone").fadeIn();
									$("#ticketNumber").html("Your Ticket-ID is <span class=\"label label-default\">" + jr.ticketNumber + "</span>");
								});
							} else {
								$("#mErrorBody").fadeIn();
								swal("Oops!", jr.isValid, "error");
								changeButton(true);
							}
						}
					});
				} else {
					swal("Oops!", "Invalid captcha result!", "error");
					changeButton(true);
				}
			});
			
			$("#submitInvoke").live("click", function () {
				var mTicketNumber = mLastTicketNumber;
				var mAnswerText = $("#submitText").val();
				var mCompleted = $("#checkboxCompleted").attr("checked") == "checked";
				
				$.ajax({
					url: "ajax/ajax.submit.answer.php",
					type: "POST",
					data: { formAnswer: mAnswerText, formTicket: mTicketNumber, formCompleted: mCompleted, formAnswerType: 0 },
					dataType: "JSON",
					success: function(jr) {
						if(jr.isValid == true) {
							$.ajax({
								url: "ajax/ajax.load.ticket.php",
								type: "POST",
								data: { formTicketNumber: mTicketNumber },
								dataType: "JSON",
								success: function(jr) {
									swal("Sent!", "Your answer has been submitted!", "success");
									if(jr.isValid == true) {
										$("#submitText").val("");
										$("#loadTicketContainer").fadeOut(function () {
											$("#loadedTicketContainer").html(jr.htmlContent).fadeIn();
											
											if(jr.ticketStatus > 0)
												$("#ticketAnswerContainer").fadeIn();
												
											if(mCompleted)
												$("#ticketAnswerContainer").fadeOut();
										});
									} else { }
								}
							});
						} else { }
					}
				});
			});

jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
			
			$(".logoutSupporter").click(function () {
				$.ajax({
					url: "ajax/ajax.logout.support.php",
					type: "POST",
					dataType: "JSON",
					data: { },
					success: function(jr) {
						top.location = "";
					}
				});
			});
		</script>
	</body>
		<script type="text/javascript" src="administrator/faq/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="administrator/faq/js/faq.js"></script>	
</html>