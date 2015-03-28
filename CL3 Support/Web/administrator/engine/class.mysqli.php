<?php
	class systemMYSQLI {
		private $mHost, $mUser, $mPass, $mData, $mPort;
		public $mConnection;
	
		public function initConnection($mHost, $mUser, $mPass, $mData, $mPort) {
			$this->mHost = $mPort == 3306 ? $mHost : $mHost.':'.$mPort;
			$this->mUser = $mUser;
			$this->mPass = $mPass;
			$this->mData = $mData;
			$this->mPort = $mPort;
			
			$this->initDataConnection();
		}
		
		private function initDataConnection() {
			$this->mConnection = new mysqli($this->mHost, $this->mUser, $this->mPass, $this->mData);
		}
	}
?>