<?php
/*
 * The data base connection class
 * */
 
require_once('config.php');

	class Db {
		
		var $host ;
		var $user ;
		var $passwd ;
		var $db ;
		var $auto_slashes ;
		var $conf;
		
		var $last_error;
		var $db_link;
		var $last_query;
		var $row_count;
		
		function db(){
			global $config;
			$this->conf = $config;
			
			$this->host = $this->conf['host'];
			$this->user = $this->conf['user'];
			$this->passwd = $this->conf['password'];
			$this->db = $this->conf['db'];
			$this->auto_slashes = true;
		}
		
		// Connect to the data base
		function connect($host = '' , $user = '' , $passwd = '', $db = '' ) {
 
      		if (!empty($host)) 		$this->host = $host; 
      		if (!empty($user)) 		$this->user = $user; 
      		if (!empty($passwd)) 	$this->passwd = $passwd;
			if (!empty($db)) 		$this->db = $db; 

        	$this->db_link = mysql_connect($this->host, $this->user, $this->passwd);
 
      		if (!$this->db_link) {
         		$this->last_error = mysql_error();
         		return false;
      		} 
  
      		if (!$this->select_db($db)) return false;
 
      		return $this->db_link; 
   		}
		
		// Select the data base 
		function select_db($db = '' ) {
      
      		if (!mysql_select_db($this->db)) {
         		$this->last_error = mysql_error();
         		return false;
      		}
 
      		return true;
   		}
		
		// Perform a SELECT Query
		function select($sql) {
      
      		$this->last_query = $sql;
      		$r = mysql_query($sql);
      		if (!$r) {
         		$this->last_error = mysql_error();
         		return false;
      		}
      		$this->row_count = mysql_num_rows($r);
      		return $r;
   		}
		
		// Get the query result
		function get_row($result, $type='MYSQL_BOTH') {
      
      		if (!$result) {
         		$this->last_error = "Invalid resource identifier passed to get_row() function.";
         		return false;  
      		}
      
      		if ($type == 'MYSQL_ASSOC') $row = mysql_fetch_array($result, MYSQL_ASSOC);
      		if ($type == 'MYSQL_NUM') 	$row = mysql_fetch_array($result, MYSQL_NUM);
      		if ($type == 'MYSQL_BOTH') 	$row = mysql_fetch_array($result, MYSQL_BOTH); 
      
      		if (!$row) return false;
      		if ($this->auto_slashes) {
         		foreach ($row as $key => $value) {
            	$row[$key] = stripslashes($value);
        	}
      		}
      		return $row;
   		}
		
		// Perform an insert 
		function insert_sql($sql) {
      		$this->last_query = $sql;
      		$r = mysql_query($sql);
      		if (!$r) {
         		$this->last_error = mysql_error();
         		return false;
      		}
      
      		$id = mysql_insert_id();
      		if ($id == 0) return true;
      		else return $id; 
   		}
		
		// Perform an update
		function update_sql($sql) {
      		$this->last_query = $sql;
      		$r = mysql_query($sql);
      		if (!$r) {
         		$this->last_error = mysql_error();
         		return false;
      		}
      
      		$rows = mysql_affected_rows();
      		if ($rows == 0) return true; 
      		else return $rows;
      
   		}
		
		function escape($values) {
			if(is_array($values))
				$values = array_map('escape', $values);
			else {    
				if ( !is_numeric($values) || $values{0} == '0' ) 
					$values = mysql_real_escape_string($values);
				}
			return $values;    
		}  
		
}
?>