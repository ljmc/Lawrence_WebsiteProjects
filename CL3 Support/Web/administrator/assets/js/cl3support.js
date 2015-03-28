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