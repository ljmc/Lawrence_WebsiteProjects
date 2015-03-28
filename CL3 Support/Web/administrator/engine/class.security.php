<?php
	class systemSECURITY {
		private function filterParams($mParams) {
			global $systemHandler;
			$systemMySQLi = &$systemHandler->getHandler("MYSQLI");
			for($i = 0; $i < count($mParams); $i++)
				$mParams[$i] = $systemMySQLi->mConnection->real_escape_string($mParams[$i]);
			return $mParams;
		}
		
		private function filterVar($mVariable) {
			global $systemHandler;
			$systemMySQLi = &$systemHandler->getHandler("MYSQLI");

			return $systemMySQLi->mConnection->real_escape_string($mVariable);
		}
		
		public function filterParam($mParams) {
			if($mParams !== null) {
				if(is_array($mParams))
					return $this->filterParams($mParams);
				else
					return $this->filterVar($mParams);
			}
			else
				return null;
		}
	}
?>