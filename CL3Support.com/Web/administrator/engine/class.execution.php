<?php
	class systemEXECUTION {
		public function runQuery($mQuery, $mParams = null) {
			global $systemHandler;
			
			$systemSecurity = &$systemHandler->getHandler("SECURITY");
			$mParams = $systemSecurity->filterParam($mParams);
			
			$systemMySQLi = &$systemHandler->getHandler("MYSQLI");
			return $systemMySQLi->mConnection->query(vsprintf($mQuery, $mParams));
		}
	}
?>