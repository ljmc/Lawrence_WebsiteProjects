<?php
/*
 * The admin authentification class
 * */
 
require_once('config.php');

    class User {
    	
		var $conf;
		
		function user(){
			global $config;
			$this->conf = $config;
			if(!isset($_SESSION['admin'])) session_start();
		}
		// Login function
		function login($login , $password){
			$login  = $this->escape($login);
    		$passwd = $this->escape($password);
			if($login != $this->conf['adminLogin'] || $password != $this->conf['adminPassword'])
				return false ;
			else 
				$_SESSION['admin'] = 'logged';
			return true ;
		}
		// Logout function
		function logout(){
			$_SESSION['admin'] = '';
		}
		
		function escape($str) {
    		$str = get_magic_quotes_gpc()?stripslashes($str):$str;
    		return $str;
  		}
		
    }
?>