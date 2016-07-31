<?php
	class Cors {
		public static function Enable($Domains) {
			// Allow CORS for specified domains
            header("Access-Control-Allow-Origin: $Domains");
        }
	}
?>