<?php
// Entry point for the app
require_once __DIR__ . "/../bootstrap.php";

// Get the URL requested and parse it
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$controller = !empty($uri[1]) ? $uri[1] : ""; // get the controller name
$method = !empty($uri[2]) ? $uri[2] : "";     // get the method name
parse_str($_SERVER['QUERY_STRING'], $params);  // get any parameters

// Run the controller's method and output the response
ControllerLoader::Run($controller, $method, $params);