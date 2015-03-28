$(document).ready(function(){
	
	var ie7 = (document.all && !window.opera && window.XMLHttpRequest) ? true : false;
	// Hiding responses , you can hide even the questions if you like , just uncomment the first line
	$("ul").css({'display':'none'});
	if(!ie7)
	$("p").css({'display':'none'});
	
	$("ul:first").slideToggle("fast");
	// Toggle the category			
	$("#faq h3").click(function(){
	$(this).next("ul").slideToggle("fast").siblings("ul:visible").slideUp("fast");
	$(this).toggleClass("active");
	$(this).siblings("h3").removeClass("active");
	});
	
	// Toggle the question
	$("#faq ul li").click(function(){
	$(this).next("p").slideToggle("fast").siblings("p:visible").slideUp("fast");
	$(this).toggleClass("active");
	$(this).siblings("li").removeClass("active");
	});
				
});