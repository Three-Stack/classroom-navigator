<?php
// Test controller

require_once(__DIR__ . "/../bootstrap.php");

class TestController extends BaseController {
    public function test($params) {
        $this->output($params, array("Content-Type: application/json"));
    }
}