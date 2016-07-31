<?php
	class Router {
		public static function CurrentUri() {
			$BasePath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
			$Uri = substr($_SERVER['REQUEST_URI'], strlen($BasePath));
			if (strstr($Uri, '?')) $Uri = substr($Uri, 0, strpos($Uri, '?'));
			$Uri = '/' . trim($Uri, '/');
			return $Uri;
		}
		
		public static function Length() {
			$Routes = Router::GetRoutes();
			return sizeof($Routes);
		}
		
		public static function GetRoute($Id) {
			$Routes = Router::GetRoutes();
			return $Routes[$Id];
		}
		
		public static function GetRoutes() {
			$BaseUrl = urldecode(Router::CurrentUri());
			$Routes = array();
			$Routes = explode('/', $BaseUrl);
			return array_slice($Routes, 1);
		}
	} 
?>