<?php
	class Database {
		public $USER = "";
		public $HOST = "";
		public $PASS = "";
		public $NAME = "";
		
		public $DB;

        function __construct() {
			$this->Connect();

			if (mysqli_connect_errno()) {
				Output::InternalServerError();
			}
        }
		
		public function Connect() {
			$this->DB = mysqli_connect($this->HOST, $this->USER, $this->PASS, $this->NAME);
		}
		
		public function Disconnect() {
			mysqli_close($this->DB);
		}
		
		public function RunQuery($Query) {
			$Result = mysqli_query($this->DB, $Query);

			if (!$Result) {
				Output::BadRequest();
			}

			return $Result;
		}
		
		public function RowsCount($Query) {
			return mysqli_num_rows($this->RunQuery($Query));
		}
		
		public function InsertId() {
			return mysqli_insert_id($this->DB);
		}
	}
?>