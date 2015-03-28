<?php
/*
 * The FAQ class
 * */
 
require_once('db.class.php');

    class Faq {
		
		var $db ;
		
		function faq(){
			$this->db = new Db();
			$this->db->connect();
		}
		
		// Used to show the FAQ in the front end 
		function showFaq(){
			$categorys = $this->db->select("SELECT * FROM faq_category ORDER BY order_number");
			$html = '<div id="faq">';
			while($row = $this->db->get_row($categorys)){
				$html .= '<h3>'.$row['title'].'</h3>';
				$questions = $this->db->select("SELECT * FROM faq_answers WHERE category_id = ".$row['id_category']." ORDER BY order_number");
				if($this->db->row_count){
					$html .= '<ul>';
						while($row = $this->db->get_row($questions)){ 
							$html .= '<li>'.$row['question'].'</li>';
							$html .= '<p>'.$row['response'].'</p>';
						}
					$html .= '</ul>';
				}
			}
			$html .= '</div>';
			return $html;
		}
		
    }
?>