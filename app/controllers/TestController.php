<?php
// Test controller

require_once(__DIR__ . "/../bootstrap.php");

class TestController extends BaseController {

    // It's an example function
    public function example($params) {
        /**
        * Controller methods are called with the url 127.0.0.1/ControllerName/methodName?params
        * Example for this method: Calling the "example" method of "TestController"
        * This method would be called with 127.0.0.1/Test/example?params
        * params gets passed in as a string-indexed array:
        * Example: 127.0.0.1/Test/example?key1=value1&key2=value2
        * params must be separated by '&' and will be a string-indexed array:
        * $params["key1"] => value1
        * $params["key2"] => value2
        * These parameters can be used inside of the function.
        */

        // Here we're expecting $params to have the format number1 = value and string1 = value
        if(empty($params["number1"])) {
            // The "number1" parameter wasn't passed in
            $this->output("number1 key not passed in"); // This will call the "output" function of BaseController
            // Output also ends the program, so nothing more needs to be done here
        }

        $number = $params["number1"]; // Declaring a variable to hold the value now that we know it exists
        if(!is_numeric($number)) {
            // number1 isn't actually a number...
            $this->output("number1 must be numeric");
        }

        // Same as above but for the second parameter
        if(empty($params["string1"])) {
            // The "string1" parameter wasn't passed in
            $this->output("string1 key not passed in"); // This will call the "output" function of BaseController
        }

        $str = $params["string1"];

        // Now we can use $someNumber and $someString inside the function
        $response = ""; // This will be the response variable we're returning

        $response .= $number . " times 10 is "; // Appending to the response string with '.'
        $number *= 10;
        $response .= "{$number}, "; // We can also use {$number} to put it directly inside a string

        $response .= "the string you input is {$str}, ";
        $str = strrev($str); // Reverse the string
        $response .= "the reversed string is {$str}";

        // Now that the response is built up, output it
        $this->output($response);

        // An example call to test this function: http://127.0.0.1/Test/example?number1=10&string1=abc
    }

    public function divideBy10($params) {
        $this->output($params["key"] / 10, array("Content-Type: application/json"));
    }

}