<?php

use PHPUnit\Framework\TestCase;
use App\entities\Battery\MiniBattery;

class MiniBatteryTest extends TestCase
{
    private static $battery;
    
    public static function setUpBeforeClass(): void
    {
        static::$battery = new MiniBattery();
        static::$battery->setBatteryMaxCapacity(5);
        static::$battery->setChargingTime(5);
        static::$battery->setTimesCharged(0);
        static::$battery->setBattery(5);
    }
    
    public static function tearDownAfterClass(): void
    {
        static::$battery = null;
    }

    public function testSetBatteryMaxCapacity(): void
    {
        static::$battery->setBatteryMaxCapacity(5);
        $this->assertEquals(5, static::$battery->getBatteryMaxCapacity());
    }

    public function testGetBatteryMaxCapacity(): void
    {
        $this->assertEquals(5, static::$battery->getBatteryMaxCapacity());
    }

    public function testSetChargingTime(): void
    {
        static::$battery->setChargingTime(5);
        $this->assertEquals(5, static::$battery->getChargingTime());
    }

    public function testGetChargingTime(): void
    {
        $this->assertEquals(5, static::$battery->getChargingTime());
    }

    public function testSetBattery(): void
    {
        static::$battery->setBattery(5);
        $this->assertEquals(5, static::$battery->getBattery());
    }

    public function testGetBattery(): void
    {
        $this->assertEquals(5, static::$battery->getBattery());
    }

    public function testSetTimesCharged(): void
    {
        static::$battery->setTimesCharged(5);
        $this->assertEquals(5, static::$battery->getTimesCharged());
    }

    public function testGetTimesCharged(): void
    {
        $this->assertEquals(5, static::$battery->getTimesCharged());
    }

    public function testIsBatteryEmpty(): void
    {
        static::$battery->setTimesCharged(5);
        $this->assertFalse(static::$battery->isBatteryEmpty());
    }
}
