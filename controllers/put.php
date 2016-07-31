<?php
	class PUT {
		public static function Run($Table, $Data) {
			if (Router::Length() == 2) {
				$Database = new Database();

				$Query = Query::Put($Table, $Data);
				$Result = $Database->RunQuery($Query);

				$Data = array('Id' => Router::GetRoute(2));
				$Query = Query::Get($Table, $Data);
				$Result = $Database->RunQuery($Query);
				
				Output::DisplaySingle($Table, $Result);
			} else {
				Output::BadRequest();
			}
        }
	}
?>