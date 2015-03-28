<?php
/*
 * This file performs Ajax calls processing
 * */
 
require_once('db.class.php');

	$db = new Db();
	$db->connect();
	
	switch($_GET['func']){
  		case 'deleteCategory':
    		$output = deleteCategory($db);
    		break;
  		case 'deleteQuestion':
    		$output = deleteQuestion($db);
    		break;
  		case 'editCategory':
    		$output = editCategory($db);
    		break;
  		case 'editQuestion':
    		$output = editQuestion($db);
    		break;
		case 'addCategory':
    		$output = addCategory($db);
    		break;
		case 'addQuestion':
    		$output = addQuestion($db);
    		break;
		case 'saveCategoryOrder':
    		$output = saveCategoryOrder($db);
    		break;
		case 'saveQuestionOrder':
    		$output = saveQuestionOrder($db);
    		break;
		default:
			$output = '';
		}
		
	echo $output;
	exit;  
	
	function deleteCategory($db){
		$result = $db->select("DELETE FROM faq_category WHERE id_category = ".$_GET['id']);
		return $result ;
	}
	
	function deleteQuestion($db){
		$result = $db->update_sql("DELETE FROM faq_answers WHERE id = ".$_GET['id']);
		return $result ;
	}
	
	function editCategory($db){
		$result = $db->update_sql("UPDATE faq_category SET title = '".$_GET['title']."' WHERE id_category = ".$_GET['id']);
		return $result ;
	}
	
	function editQuestion($db){
		$question = mysql_real_escape_string($_GET['question']);
		$response = mysql_real_escape_string($_GET['response']);
		$result = $db->update_sql("UPDATE faq_answers SET question = '".$question."' , response = '".$response."' WHERE id = ".$_GET['id']);
		return $result ;
	}
	
	function addCategory($db){
		$result = $db->insert_sql("INSERT INTO faq_category VALUES('','".$_GET['title']."','')");
		if($result)
			$db->update_sql("UPDATE faq_category SET order_number = '".$result."' WHERE id_category = ".$result);
		header('Location: ../index.php');
		//return $result ;
	}
	
	function addQuestion($db){
		$result = $db->insert_sql("INSERT INTO faq_answers VALUES('','".$_GET['question']."','".$_GET['response']."','".$_GET['category']."','')");
		if($result)
			$db->update_sql("UPDATE faq_answers SET order_number = '".$result."' WHERE id = ".$result);
		return $result ;
	}
	
	// For saving sorting order of categories
	function saveCategoryOrder($db){
		$categories = explode("&",$_GET['order']);
		for($i = 0 ; $i < sizeof($categories) ; $i++){
			$id = preg_replace("/[^0-9]/", '', $categories[$i]);
			$result = $db->update_sql("UPDATE faq_category SET order_number = '".$i."' WHERE id_category = ".$id);
		}
		return true ;
	}
	
	// For saving sorting order of questions
	function saveQuestionOrder($db){
		$questions = explode("&",$_GET['order']);
		for($i = 0 ; $i < sizeof($questions) ; $i++){
			$id = preg_replace("/[^0-9]/", '', $questions[$i]);
			$result = $db->update_sql("UPDATE faq_answers SET order_number = '".$i."' WHERE id = ".$id);
		}
		return true ;
	}
?>