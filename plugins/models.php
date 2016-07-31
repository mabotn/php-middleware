<?php
	class Models {
		public static function Exists($Table, $Models) {
			// Check if table is lsited in models
			return in_array($Table, $Models);
		}
	}
?>