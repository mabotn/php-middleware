<?php
	class DELETE {
		public static function Run($Table, $Data) {
            if (Router::Length() == 2) {
				$Database = new Database();
				
				$Data = array('Id' => Router::GetRoute(2));
				$Query = Query::Delete($Table, $Data);
				$Result = $Database->RunQuery($Query);
				
				Output::Success();
			} else {
				Output::BadRequest();
			}
        }
	}
?>