<?php
	// error_reporting(0);
	class systemCORE {
		public function __construct() {
			$this->initSystemFiles();
			$this->initConfiguration();
		}
		
		private function initConfiguration() {
			global $systemHandler;
			$systemConfig = &$systemHandler->getHandler("CONFIG");
			$systemHandler->getHandler("MYSQLI")->initConnection($systemConfig->mSQLHost, $systemConfig->mSQLUser, $systemConfig->mSQLPass, $systemConfig->mSQLData, $systemConfig->mSQLPort);
		}
		
		private $mSystemFiles = array();
		private function initSystemFiles() {
			$mDisallowedSystemFiles = array("core", "handler", "config");
			require_once("class.handler.php");
			require_once("class.config.php");
			global $systemHandler;
			$systemHandler = new systemHANDLER();
			$systemHandler->appendHandler("CONFIG", new systemCONFIG()); 
			foreach(scandir(__DIR__) as $mSystemFile) {
				$mSplittedSystemFile = explode('.', $mSystemFile);
				if($mSplittedSystemFile[0] == "class")
					if(!in_array($mSplittedSystemFile[1], $mDisallowedSystemFiles)) {
						require_once(vsprintf("class.%s.php", strtolower($mSplittedSystemFile[1])));
						$mClassName = vsprintf("system%s", strtoupper($mSplittedSystemFile[1]));
						$mClassCached = new $mClassName();
						$systemHandler->appendHandler(strtoupper($mSplittedSystemFile[1]), $mClassCached);
					}
			}
		}
	}
	
	// Initialize the awesomeness.. :P
	$systemCORE = new systemCORE();
?>