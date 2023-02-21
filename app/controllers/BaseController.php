<?php
// Base controller

class BaseController {
    protected $response;
    protected $message;
    
    /**
     * Base function for unimplemented methods
     */
    public function __call($name, $args) {
        echo($_SERVER);
        $this->output("Invalid Request", array('HTTP/1.1 404 Not Found'));
    }

    /**
     * Generic API output
     */
    public static function output($data, $headers) {
        if (is_array($headers) && count($headers)) {
            foreach ($headers as $h) {
                header($h);
            }
        }
        print_r($data);
        die();
    }
}