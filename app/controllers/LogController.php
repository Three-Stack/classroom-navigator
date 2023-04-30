<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once(__DIR__ . "/../bootstrap.php");

class LogController extends BaseController {

   public function log() {
      $log = new Logger('name');
      $log->pushHandler(new StreamHandler('log.log'));

      $log->debug("Debug Message");
      $this->setResponse("Debug message logged");
   }
}
