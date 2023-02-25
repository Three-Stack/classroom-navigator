<?php
namespace JsonMapper\Tests\Implementation;
require_once(__DIR__ . "/../bootstrap.php");

class SimpleObject
{
    /** @var string */
    private $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
$mapper = (new \JsonMapper\JsonMapperFactory())->default();
$object = new \JsonMapper\Tests\Implementation\SimpleObject();

$mapper->mapObject(json_decode('{ "name": "John Doe" }'), $object);

var_dump($object);