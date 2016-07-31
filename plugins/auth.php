<?php
	class Auth {
		public static function Check($User, $Pass) {
			if ($User == '' && $Pass == '') {
				// Allow access if User and Path are empty
				return TRUE;
			} else if (!isset($_SERVER['PHP_AUTH_USER'])) {
				// Retrieve HTTP Auth credentials if not available
				header('WWW-Authenticate: Basic realm="Realm"');
				return FALSE;
			} else if ($_SERVER['PHP_AUTH_USER'] == $User && $_SERVER['PHP_AUTH_PW'] == $Pass) {
				// Check HTTP Auth credentials if available
				return TRUE;
			} else {
				// Retrieve new HTTP Auth credentials if not correct
				header('WWW-Authenticate: Basic realm="Realm"');
				return FALSE;
			}
        }
	}
?>