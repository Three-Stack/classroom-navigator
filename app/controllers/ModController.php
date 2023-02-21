<?php
// Test controller

require_once(__DIR__ . "/../bootstrap.php");

class ModController extends BaseController {
   public function mod($number) {
      if (FALSE === is_numeric($number["number"]))
      {
         $this->output("Please enter a number",array("Content-Type: application/json"));
      }
      else{
         $this -> output($number["number"]." modulo by 10 is ".$number["number"] % 10,array("Content-Type: application/json"));
      }
   }
}
