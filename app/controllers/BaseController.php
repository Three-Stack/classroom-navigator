<?php
// Base controller

class BaseController {
    protected $response = "No response populated by the controller";
    protected $headers = array();
    
    /**
     * Base function for unimplemented methods
     */
    public function __call($name, $args) {
        // An invalid request was made
        $this->setResponse("Invalid Request");
        $this->addHeader('HTTP/1.1 404 Not Found');
    }

    /**
     * Adds a header to the controller
     */
    protected function addHeader($header) {
        $headers[] = $header;
    }

    /**
     * Sets the controller's response message
     * The response can be a string, or JSON.
     */
    protected function setResponse($response) {
        $this->response = $response;
    }

    /**
     * Gets the controller's response
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Outputs the response of the controller
     */
    public function output() {
        $headers = $this->headers;
        if (is_array($headers) && count($headers)) {
            foreach ($headers as $h) {
                header($h);
            }
        }
        else {
            // No headers specified - set the default response as application/json
            header("Content-Type: application/json");
        }
        print_r(json_encode($this->response));
        die();
    }
}