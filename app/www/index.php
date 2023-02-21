<?php
// Entry point for the app
require_once __DIR__ . "/../bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$controller = $uri[1];
$method = $uri[2];
parse_str($_SERVER['QUERY_STRING'], $params);

ControllerLoader::Run($controller, $method, $params);

// This code gets called when the controller doesn't output anything (which should never happen)
BaseController::output("No response populated by the controller", "HTTP/1.1 403 Forbidden");