<?php
/**
 * This is a phpunit test
 * Tests the TestController to make sure it's testing properly
 */

require_once(__DIR__ . "/../bootstrap.php");

use PHPUnit\Framework\TestCase;

class TestTest extends TestCase {

    /**
     * Tests the example function of the TestController
     */
    public function testExample() {
        $tc = new TestController(); // Make a new TestController

        // Check the default response
        $this->assertEquals("No response populated by the controller", $tc->getResponse());

        // Test the example function
        // Test data: params, expected response
        $testData = array(
            array("params" => array(), "expected" => "number1 key not passed in"), // no params
            array("params" => array("number1" => "abcd"), "expected" => "number1 must be numeric"), // non-numeric number1
            array("params" => array("number1" => 123), "expected" => "string1 key not passed in"), // numeric number1, no string1
            // Test correct params
            array("params" => array("number1" => 10, "string1" => "abc"), "expected" => "10 times 10 is 100, the string you input is abc, the reversed string is cba"),
            array("params" => array("number1" => 302, "string1" => "ccc"), "expected" => "302 times 10 is 3020, the string you input is ccc, the reversed string is ccc"),
            array("params" => array("number1" => -0.5, "string1" => "example"), "expected" => "-0.5 times 10 is -5, the string you input is example, the reversed string is elpmaxe"),
        );

        // Null array
        foreach($testData as $data) {
            $tc->example($data["params"]);
            $this->assertEquals($data["expected"], $tc->getResponse());
        }
    }
}