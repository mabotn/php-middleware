<?php
	class GET {
		public static function Run($Table, $Data) {
			$Database = new Database();
			
            if (Router::Length() == 1) {
				$Query = Query::Get($Table, $Data);
				$Result = $Database->RunQuery($Query);

				Output::Display($Table, $Result);
			} else {
				$Data['Id'] = Router::GetRoute(1);
				$Query = Query::Get($Table, $Data);
				$Result = $Database->RunQuery($Query);
				
				Output::DisplaySingle($Table, $Result);
			}
        }
	}
?>