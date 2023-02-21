<?php

require_once(__DIR__ . "/../bootstrap.php");

$db = DBConnection::db();
$query = $db->query('SHOW VARIABLES like "version"');
$row = $query->fetch();
echo 'MySQL version:' . $row['Value'];

use PHPUnit\Framework\TestCase;

class Test extends TestCase {
    public function testHello() {
        $this->assertTrue(true);
    }
}