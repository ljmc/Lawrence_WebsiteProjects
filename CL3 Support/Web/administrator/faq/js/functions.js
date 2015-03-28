$(document).ready(function(){

	$("#faqpanel .category a.toggle").click(function(){
		$(this).next("ul").slideToggle("fast")
		.siblings("ul:visible").slideUp("fast");
	});
	
	$("#faqpanel .category ul li a.toggle").click(function(){
		$(this).next("p").slideToggle("fast")
		.siblings("p:visible").slideUp("fast");
	});
	
	// The help window
	$("#header a.help").click(function(){
		var txt = '<h2>Instructions :</h2><br/> You can sort your categories and questions in any order you want just by dragging and dropping them in the new location';
		$.prompt(txt,{buttons:{OK:true}});
	});
	
	removeQuestion = function(id){
		var txt = 'Are you sure you want to remove this question and it\'s corresponding response ?<input type="hidden" id="question" name="question" value="'+id+'" />';
		$.prompt(txt,{ 
					buttons:{Delete:true, Cancel:false},
					callback: function(v,m,f){
						if(v){						
							$.get("include/process.php",{func:'deleteQuestion',id:f.question},
  									function(data){
										if(data){
											$("li#question"+id).hide('slow', function(){ $(this).remove(); });
											$("#messages").css({opacity: 100});
											$("#messages").text("Question deleted !").effect('highlight',null,1500,null).animate({opacity: 0}, 1000);
										}
    									else{ $.prompt('An Error Occured while removing this question'); }	
  									});
							}				
						else{}					
					}
				});
	}
	
	removeCategory = function(id){
		var txt = 'Are you sure you want to remove this Category ?<input type="hidden" id="category" name="category" value="'+id+'" />';
		$.prompt(txt,{ 
					buttons:{Delete:true, Cancel:false},
					callback: function(v,m,f){
						if(v){
							$.get("include/process.php",{func:'deleteCategory',id:f.category},
  									function(data){
										if(data){
											$("#category"+f.category).hide('slow', function(){ $(this).remove(); });
											$("#messages").css({opacity: 100});
											$("#messages").text("Category deleted !").effect('highlight',null,1500,null).animate({opacity: 0}, 1000);
										}else{ $.prompt('An Error Occured while removing this category'); }							
									});
						}
						else{}		
					}
				});
	}
	
	editCategory = function(id){
				var category = $("#category"+id);
				var title = category.find('.title').text();

				var txt = 'What would you like to change this to?'+
					'<div class="field"><label for="editCategory">Title : </label><input type="text" id="editCategory" name="title" value="'+ title +'" /></div><input type="hidden" id="category" name="category" value="'+id+'" />';
				
				$.prompt(txt,{ 
					buttons:{Change:true, Cancel:false},
					submit: function(v,m,f){
						var flag = true;
						if (v) {
							if ($.trim(f.title) == '') {
								m.find('#editCategory').addClass('error');
								flag = false;
							}
							else m.find('#editCategory').removeClass('error');
						}
						return flag;
					},
					callback: function(v,m,f){
						if(v){		
								$.get("include/process.php",{func:'editCategory',id:f.category,title:f.title},
  									function(data){
										if(data){					
											category.find('.title').text(f.title);
											$("#messages").css({opacity: 100});
											$("#messages").text("Category saved !").effect('highlight',null,1500,null).animate({opacity: 0}, 1000);
										}else{ $.prompt('An Error Occured while editing this category'); }							
									});
						}
						else{}
						
					}
				});
			}
			
			
			editQuestion = function(id){
				var question = $('li#question'+id);
				var q = question.find('.question').text();
				var response = question.find('p').text();

				var txt = 'What would you like to change this to?'+
					'<div class="field"><label for="editQuestion">Question : </label><input type="text" id="editQuestion" name="question" value="'+ q +'" /></div>'+
					'<div class="field"><label for="editResponse">Response : </label><textarea cols="40" rows="8" id="editResponse" name="response">'+response+'</textarea></div><input type="hidden" id="id" name="id" value="'+id+'" />';
				
				$.prompt(txt,{ 
					buttons:{Change:true, Cancel:false},
					submit: function(v,m,f){
						var flag = true;
						if (v) {
							if ($.trim(f.question) == '') {
								m.find('#editQuestion').addClass('error');
								flag = false;
							}
							else m.find('#editQuestion').removeClass('error');
							
							if ($.trim(f.response) == '') {
								m.find('#editResponse').addClass('error');
								flag = false;
							}
							else m.find('#editResponse').removeClass('error');
							
						}
						return flag;
					},
					callback: function(v,m,f){
						
						if(v){			
								$.get("include/process.php",{func:'editQuestion',id:f.id,question:f.question,response:f.response},
  									function(data){
										if(data){
											question.find('.question').text(f.question);
											question.find('p').text(f.response);
											$("#messages").css({opacity: 100});
											$("#messages").text("Question saved !").effect('highlight',null,1500,null).animate({opacity: 0}, 1000);
										}else{ $.prompt('An Error Occured while editing this question'); }							
									});
						}
						else{}
						
					}
				});
			}
			
			
			addCategory = function(){
				
				var txt = 'Enter the category title'+
					'<div class="field"><label for="addCategory">Title : </label><input type="text" size="20" id="addCategory" name="title" value=""/></div>';
				
				$.prompt(txt,{ 
					buttons:{Add:true, Cancel:false},
					submit: function(v,m,f){
						var flag = true;
						if (v) {
							
							if ($.trim(f.title) == '') {
								m.find('#addCategory').addClass('error');
								flag = false;
							}
							else m.find('#addCategory').removeClass('error');							
							
						}
						return flag;
					},
					callback: function(v,m,f){
						
						if(v){							
							$.get("include/process.php",{func:'addCategory',title:f.title},
  									function(data){
										if(data){	
											window.location = "index.php";
											$("#messages").css({opacity: 100});
											$("#messages").text("Category added !").effect('highlight',null,1500,null).animate({opacity: 0}, 1000);
									
										}else{ $.prompt('An Error Occured while adding this category'); }							
									});
						}
						else{}
						
					}
				});
			}
			
			
			addQuestion = function(id){
				
				var txt = 'Enter the question and the corresponding response'+
					'<div class="field"><label for="addQuestion">Question : </label><input type="text" id="addQuestion" name="question" value="" /></div>'+
					'<div class="field"><label for="addResponse">Response : </label><textarea cols="40" rows="8" id="addResponse" name="response"></textarea></div><input type="hidden" id="category" name="category" value="'+id+'" />';
				
				$.prompt(txt,{ 
					buttons:{Add:true, Cancel:false},
					submit: function(v,m,f){
		
						var flag = true;
						if (v) {
							
							if ($.trim(f.question) == '') {
								m.find('#addQuestion').addClass('error');
								flag = false;
							}
							else m.find('#addQuestion').removeClass('error');
							
							if ($.trim(f.response) == '') {
								m.find('#addResponse').addClass('error');
								flag = false;
							}
							else m.find('#addResponse').removeClass('error');
							
						}
						return flag;
					},
					callback: function(v,m,f){
						
						if(v){							
							$.get("include/process.php",{func:'addQuestion',question:f.question,response:f.response,category:f.category},
  									function(data){
										if(data){
											window.location = "index.php";
											$("#messages").css({opacity: 100});
											$("#messages").text("Question added !").effect('highlight',null,1500,null).animate({opacity: 0}, 1000);		
										}else{ $.prompt('An Error Occured while adding this question'); }							
							});
						}
						else{}
						
					}
				});
			}

	// For sorting and saving the order of categorys
	$('.sortableCategorys').sortable({items: 'div',
                update: function(event, ui){
					var buffer = "";
					var new_order = $('.sortableCategorys').sortable('toArray');
					 $.each(new_order, function(i, element) {
                        buffer +=element+"&";
                    });
					$.get("include/process.php", {func:'saveCategoryOrder',order:buffer}, function(data){
						if (data) {
							$("#messages").css({opacity: 100});
							$("#messages").text("New categories order saved !").effect('highlight', null, 1500, null).animate({opacity: 0}, 1000);
						}
					});
				}
            });
			
			
	// For sorting and saving the order of questions		
	$('.sortableQuestions').sortable({items: 'li',
                update: function(event, ui){
					var buffer = "";
					var new_order = $('.sortableQuestions').sortable('toArray');
					 $.each(new_order, function(i, element) {
                        buffer +=element+"&";
                    });
					$.get("include/process.php", {func:'saveQuestionOrder',order:buffer}, function(data){
						if (data) {
							$("#messages").css({opacity: 100});
							$("#messages").text("New questions order saved !").effect('highlight', null, 1500, null).animate({opacity: 0}, 1000);
						}
					});
				}
            });


});