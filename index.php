<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', 1);
	// ini_set('html_errors', false);

	// Load Core Modules
	include("core/query.php");
	include("core/router.php");
	include("core/output.php");
	include("core/request.php");
	include("core/database.php");

	// Load controllers for each method
	include("controllers/get.php");
	include("controllers/put.php");
	include("controllers/post.php");
	include("controllers/delete.php");

	// Load plugins
	include("plugins/log.php");
	include("plugins/auth.php");
	include("plugins/cors.php");
	include("plugins/models.php");

	// Get Table Name
	$Table  = router::GetRoute(0);
	// Get Requested Data
	$Data   = request::GetData();
	// Specify Requested Method
	$Method = request::Method();

	// Initialize Response Headers
	Output::SetupResponseHeaders();
	// Enable CORS (Cross Origin Resource Sharing)
	Cors::Enable('*');
	// Log the entire request to server
	Log::Save();

	// Initialize list of available models in database
	$Models = array();

	// Check access based on HTTP Authentication
	// Leave parameters empty to disable authentication check
	if (Auth::Check('', '')) {
		// Check if requested table is listed in models
		if (Models::Exists($Table, $Models)) {
			switch ($Method) {
				// Handle controllers following the requested method
				case 'DELETE': Delete::Run($Table, $Data); break;
				case 'POST': Post::Run($Table, $Data); break;
				case 'GET': Get::Run($Table, $Data); break;
				case 'PUT': Put::Run($Table, $Data); break;

				// OPTIONS for JavaScrip XHR based requests
				case 'OPTIONS': break;

				// Print Method Not Allowed error when method is not allowed
				default: Output::MethodNotAllowed(); break;
			}
		} else {
			// Print Forbidden error when requested table is not listed in models
			Output::Forbidden();
		}
	} else {
		// Print Unauthorized error when authentication check fails
		Output::Unauthorized();
	}
?>