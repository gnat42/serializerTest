<?php

namespace App\Tests;

use App\SecondSimpleObject;
use App\SimpleObject;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

class SimpleObjectTest extends TestCase
{
    /** @var SerializerInterface */
    private $serializer;

    protected function setUp(): void
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function testFailingSerializationAnnotations(): void
    {
        $obj = new SimpleObject('Woo hoo');
        $output = $this->serializer->toArray($obj);
        self::assertArrayHasKey('Identity', $output);
        self::assertArrayHasKey('Object Name', $output);
        self::assertArrayHasKey('2nd', $output, print_r($output, true));
    }

    public function testSerializationAnnotations(): void
    {
        $obj = new SecondSimpleObject('Woo hoo');
        $output = $this->serializer->toArray($obj);
        self::assertArrayHasKey('Identity', $output);
        self::assertArrayHasKey('Object Name', $output);
        self::assertArrayHasKey('2nd', $output, print_r($output, true));
    }
}
