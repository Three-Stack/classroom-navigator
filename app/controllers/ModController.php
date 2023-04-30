<?php
// Test controller

require_once(__DIR__ . "/../bootstrap.php");

class ModController extends BaseController {
   public function mod($number) {
      if (FALSE === is_numeric($number["number"]))
      {
         $this->setResponse("Please enter a number");
      }
      else{
         $this->setResponse($number["number"]." modulo by 10 is ".$number["number"] % 10);
      }
   }
}
