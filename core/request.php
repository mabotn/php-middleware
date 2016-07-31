<?php
	class Request {
		public static function Method() {
			return $_SERVER['REQUEST_METHOD'];
		}
		
		public static function GetData() {
			if (Request::Method() == "GET") return $_GET;
			else if (Request::Method() == "POST") return $_POST;
			else {
				parse_str(file_get_contents("php://input"), $Data);
				return $Data;
			}
		}
	}
?>