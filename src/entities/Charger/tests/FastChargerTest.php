<?php

use PHPUnit\Framework\TestCase;
use App\entities\Charger\FastCharger;
use App\entities\Battery\MiniBattery;

class FastChargerTest extends TestCase
{
    private static $fastCharger;
    private static $battery;
    
    public static function setUpBeforeClass(): void
    {
        static::$fastCharger = new FastCharger();
        static::$battery = new MiniBattery();
        static::$battery->setBatteryMaxCapacity(5);
        static::$battery->setChargingTime(5);
        static::$battery->setTimesCharged(0);
        static::$battery->setBattery(5);
    }
    
    public static function tearDownAfterClass(): void
    {
        static::$fastCharger = null;
        static::$battery = null;
    }

    public function testInstallBattery(): void
    {
        static::$fastCharger->setBattery(static::$battery);
        $this->assertInstanceOf(MiniBattery::class, static::$fastCharger->getBattery());
    }

    public function testGetBattery(): void
    {
        $this->assertInstanceOf(MiniBattery::class, static::$fastCharger->getBattery());
    }
}
