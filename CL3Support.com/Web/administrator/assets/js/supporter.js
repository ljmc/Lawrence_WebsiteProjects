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