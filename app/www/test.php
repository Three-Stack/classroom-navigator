<?php

require_once(__DIR__ . "/../bootstrap.php");

$db = DBConnection::db();
$query = $db->query('SHOW VARIABLES like "version"');
$row = $query->fetch();
echo 'MySQL version:' . $row['Value'];

use PHPUnit\Framework\TestCase;
/*use Intervention\Image\ImageManager;

$manager = new ImageManager(['driver' => 'imagick']);

// to finally create image instances
$image = $manager->make(__DIR__ . '/foo.jpg')->resize(300, 200);
$image->save(__DIR__ . '/bar.jpg');*/

class Test extends TestCase {
    public function testHello() {
        $this->assertTrue(true);
    }
}