<?php
// Test controller
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once(__DIR__ . "/../bootstrap.php");

class LogController extends BaseController {
   public function mod($number) {
      if (FALSE === is_numeric($number["number"]))
      {
         $this->setResponse("Please enter a number");
      }
      else{
         $this->setResponse($number["number"]." modulo by 10 is ".$number["number"] % 10);
      }
   }

   public function log() {
      $log = new Logger('name');
      $log->pushHandler(new StreamHandler('log.log'));

      $log->debug("Debug Message");
      $this->setResponse("Debug message logged");
   }
}
