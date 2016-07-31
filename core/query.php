<?php
	class Query {
		public static function Get ($Table, $Data) {
			$Query = "SELECT * FROM $Table";
			$DataLength = sizeof($Data);
			if ($DataLength > 0) {
				$Query .= " WHERE ";
				$Counter = 1;
				foreach ($Data as $Key => $Value) {
					if ($Counter < $DataLength) $Query .= " $Key='$Value' AND ";
					else $Query .= " $Key='$Value' ";
					$Counter++;
				}
			}
			return $Query;
		}
		
		public static function Post($Table, $Data) {
			$Query = "INSERT INTO $Table VALUES (NULL, ";
			$Counter = 1;
			$DataLength = sizeof($Data);
			foreach ($Data as $Key => $Value) {
				$Query .= " '$Value'";
				if ($Counter < $DataLength) $Query .= ",";
				$Counter++;
			}
			$Query .= ")";
			return $Query;
		}
		
		public static function Put($Table, $Data) {
			$Query = "UPDATE $Table SET ";
			$Counter = 1;
			$DataLength = sizeof($Data);
			foreach ($Data as $Key => $Value) {
				$Query .= " $Key='$Value'";
				if ($Counter < $DataLength) $Query .= ",";
				$Counter++;
			}
			$Query .= " WHERE Id=" . Router::GetRoute(2);
			return $Query;
		}
		
		public static function Delete($Table, $Data) {
			$Query = "DELETE FROM $Table WHERE Id=" . $Data['Id'];
			return $Query;
		}
	}
?>