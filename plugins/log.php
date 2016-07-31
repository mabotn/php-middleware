<?php
	class Log {
		public static function Save() {
			// Retrieve requested method
			$Method = $_SERVER['REQUEST_METHOD'];
			// Retrieve requested uri
			$Uri = $_SERVER['REQUEST_URI'];
			// Retrieve IP sending the request
			$Ip = $_SERVER['REMOTE_ADDR'];
			// Retrieve request time
			$Date = date('d/m/Y H:i:s');

			// Prepare line to print to file
			$LogRecord = "$Ip $Method $Uri $Date\n"; 

			// Open log file
			$logFile = fopen('log.html', 'a');
			// Save line to file
			fwrite($logFile, $LogRecord);
			// Close file
			fclose($logFile);
        }
	}
?>