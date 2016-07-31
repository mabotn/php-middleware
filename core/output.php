<?php
	class Output {
		public static function SetupResponseHeaders() {
			header('Content-Type: application/json');
		}
		
		public static function Retrive($Table, $Result) {
			$Output = array();

			while($Data = mysqli_fetch_assoc($Result)) {
				$Output[] = $Data;
			}

			print json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}

		public static function RetrieveSingle($Table, $Result) {
			if (mysqli_num_rows($Result) == 0) {
				Output::NotFound();
            } else {
				$Output = array();

				while($Data = mysqli_fetch_assoc($Result)) {
					$Output = $Data;
				}

				print json_encode($Output, JSON_PRETTY_PRINT);
				die();
            }
		}
		
		public static function BadRequest() {
			http_response_code(400);

			$Output = array(
				"Message" => "Bad Request",
				"Details" => "The request could not be understood by the server due to malformed syntax."
			);
			
			echo json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}
		
		public static function Unauthorized() {
			http_response_code(401);

			$Output = array(
				"Message" => "Unauthorized",
				"Details" => "The request requires user authentication."
			);
			
			echo json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}
		
		public static function Forbidden() {
			http_response_code(403);

			$Output = array(
				"Message" => "Forbidden",
				"Details" => "The server understood the request, but is refusing to fulfill it."
			);

			echo json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}
		
		public static function NotFound() {
			http_response_code(404);

			$Output = array(
				"Message" => "Not Found",
				"Details" => "The server has not found anything matching your request."
			);

			echo json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}

		public static function MethodNotAllowed() {
			http_response_code(405);

			$Output = array(
				"Message" => "Method Not Allowed",
				"Details" => "The requested method is not allowed."
			);

			echo json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}
		
		public static function InternalServerError() {
			http_response_code(500);

			$Output = array(
				"Message" => "Internal Server Error",
				"Details" => "The server encountered an unexpected condition which prevented it from fulfilling the request."
			);

			echo json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}
		
		public static function Success() {
			http_response_code(200);
			
			$Output = array(
				"Message" => "OK",
				"Details" => "The request has succeeded."
			);

			echo json_encode($Output, JSON_PRETTY_PRINT);
			die();
		}
	}
?>