<?php
	class systemSESSION {
		private $mSessionCollection = array();
		private $mSessionContainer = "DATA.COLLECTION";
		
		public function __construct() {
			session_start();
		}
		
		public function destroySessions() {
			session_destroy();
		}
		
		public function getSession($mKey) {
			return $_SESSION[$this->mSessionContainer][$mKey];
		}
		
		public function addSession($mKey, $mValue) {
			$_SESSION[$this->mSessionContainer][$mKey] = $mValue;
		}
		
		public function aliveSession($mKey) {
			return isset($_SESSION[$this->mSessionContainer][$mKey]);
		}
	}
?>