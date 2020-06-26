<?php

use PHPUnit\Framework\TestCase;
use App\entities\Floor\CarpetFloor;

class CarpetFloorTest extends TestCase
{
    private static $carpetFloor;
    private static $area;
    private static $cleaningCost;

    public static function setUpBeforeClass(): void
    {
        static::$carpetFloor = new CarpetFloor();
        static::$area = 60;
        static::$cleaningCost = 2;
    }
    
    public static function tearDownAfterClass(): void
    {
        static::$carpetFloor = null;
        static::$area = null;
    }
    
    public function testSetArea(): void
    {
        static::$carpetFloor->setArea(static::$area);
        $this->assertEquals(static::$carpetFloor->getArea(), static::$area);
    }

    public function testGetArea(): void
    {
        $this->assertEquals(static::$carpetFloor->getArea(), static::$area);
    }

    public function testSetCleaningCost(): void
    {
        static::$carpetFloor->setCleaningCost(static::$cleaningCost);
        $this->assertEquals(static::$carpetFloor->getCleaningCost(), static::$cleaningCost);
    }

    public function testGetCleaningCost(): void
    {
        $this->assertEquals(static::$carpetFloor->getCleaningCost(), static::$cleaningCost);
    }
}
