<?php
/**
 * This is a phpunit test
 * Tests the LineTestController to make sure it's adding lines properly properly
 */

require_once(__DIR__ . "/../bootstrap.php");

use PHPUnit\Framework\TestCase;

class imagetest extends TestCase {
   public function testExample() {
      $tc = new LineTestController(); // Make a new LineTestController

      // Check the default response
      $this->assertEquals("No response populated by the controller", $tc->getResponse());
      $testData = array(
         array("params" => array(), "expected" => "img key not passed in"), // no params
         array("params" => array("img" => 100), "expected" => "img must be string"), // non-string img
         array("params" => array("img" => "100"), "expected" => "file not found"), // file not found img
         array("params" => array("img" => "b17-2.jpg","x" => "line.jpg"), "expected" => "x must be int"), // img found, non-int x 
         array("params" => array("img" => "b17-2.jpg","x" => 100,"y" => "line.jpg"), "expected" => "y must be int"), // img found, int x,non-int y 
         
         // Test correct params
         array("params" => array("img" => "line.jpg", "x" => 100, "y"=>110), "expected" => "The Color at x=100 and y=110 is #fe0002"),
         array("params" => array("img" => "line.jpg", "x" => 110, "y"=>110), "expected" => "The Color at x=110 and y=110 is not #fe0002"),
     );

     // Null array
     foreach($testData as $data) {
         $tc->example($data["params"]);
         $this->assertEquals($data["expected"], $tc->getResponse());
     }
   }
}