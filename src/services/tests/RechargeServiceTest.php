<?php

use PHPUnit\Framework\TestCase;
use App\entities\Charger\FastCharger;
use App\entities\Battery\MiniBattery;
use App\services\RechargeService;

class RechargeChargerTest extends TestCase
{
    public function testRechargeBattery(): void
    {
        $miniBattery = new MiniBattery();
        $miniBattery->setBatteryMaxCapacity(5);
        $miniBattery->setChargingTime(5);
        $miniBattery->setTimesCharged(0);
        $miniBattery->setBattery(5);

        $fastCharger = new FastCharger();
        $fastCharger->setBattery($miniBattery);

        $chargeService = new RechargeService($fastCharger);
        $chargeService->recharge();

        $this->assertEquals(5, $miniBattery->getBattery());
    }
}
