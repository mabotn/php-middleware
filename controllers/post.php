<?php
	class POST {
		public static function Run($Table, $Data) {
			$Database = new Database();

            $Query = Query::Post($Table, $Data);
			$Result = $Database->RunQuery($Query);

			$Data = array('Id' => $Database->InsertId());
			$Query = Query::Get($Table, $Data);
			$Result = $Database->RunQuery($Query);
			
			Output::DisplaySingle($Table, $Result);
        }
	}
?>