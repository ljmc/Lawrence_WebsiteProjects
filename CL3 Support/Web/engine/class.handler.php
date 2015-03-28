<?php
	class systemHANDLER {
		private $mHandlerCollection = array();
		
		public function appendHandler($mIdentifier, $mHandler) {
			$this->mHandlerCollection[$mIdentifier] = $mHandler;
		}
		
		public function getHandler($mIdentifier) {
			return $this->mHandlerCollection[$mIdentifier];
		}
	}
?>