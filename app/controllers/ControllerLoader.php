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
        if(!$controller || !is_file($controllerPath)) {
            // Invalid request
            $c = new BaseController;
        }
        else {
            // Valid request - process it
            require_once($controllerPath);
            $c = new $controller();
            
        }
        
        $c->$method($params);
        $c->output();
    }
}