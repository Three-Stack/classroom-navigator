<?php
/**
 * Loads up the controller and runs the method
 */

require_once __DIR__ . "/../bootstrap.php";

class ControllerLoader {

    // Runs the method of the controller
    public static function Run($controller, $method, $params) {
        $controller .= "Controller";
        $controllerPath = __DIR__ . "/{$controller}.php";
        if(!$controller || !$method || !is_file($controllerPath)) {
            print_r($controller);
            BaseController::output("Invalid Request", array("HTTP/1.1 404 Not Found"));
        }
        require_once($controllerPath);
        $c = new $controller();
        $c->$method($params);
    }
}