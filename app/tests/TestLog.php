<?php
/**
 * This is a phpunit test
 * Tests the TestController to make sure it's testing properly
 */

require_once(__DIR__ . "/../bootstrap.php");

use PHPUnit\Framework\TestCase;

class TestLog extends TestCase {

    /**
     * Tests the example function of the TestController
     */
    public function test() {
        $lc = new LogController(); // Make a new TestController


        $lc->log();
        //check if the correct response is logged after logging a message
        $this->assertSame("Debug message logged", $lc->getResponse());

    }
}