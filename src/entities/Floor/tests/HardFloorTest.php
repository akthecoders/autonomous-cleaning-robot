<?php

use PHPUnit\Framework\TestCase;
use App\entities\Floor\HardFloor;

class HardFloorTest extends TestCase
{
    private static $hardFloor;
    private static $area;
    private static $cleaningCost;

    public static function setUpBeforeClass(): void
    {
        static::$hardFloor = new HardFloor();
        static::$area = 60;
        static::$cleaningCost = 2;
    }
    
    public static function tearDownAfterClass(): void
    {
        static::$hardFloor = null;
        static::$area = null;
        static::$cleaningCost = null;
    }
    
    public function testSetArea(): void
    {
        static::$hardFloor->setArea(static::$area);
        $this->assertEquals(static::$hardFloor->getArea(), static::$area);
    }

    public function testGetArea(): void
    {
        $this->assertEquals(static::$hardFloor->getArea(), static::$area);
    }

    public function testSetCleaningCost(): void
    {
        static::$hardFloor->setCleaningCost(static::$cleaningCost);
        $this->assertEquals(static::$hardFloor->getCleaningCost(), static::$cleaningCost);
    }

    public function testGetCleaningCost(): void
    {
        $this->assertEquals(static::$hardFloor->getCleaningCost(), static::$cleaningCost);
    }
}
