<?php

namespace App\services;

use App\entities\Charger\Interfaces\Charger;
use App\entities\Battery\Interfaces\Battery;
class RechargeService
{
    private $charger;
    private $battery;

    public function __construct(Charger $charger) {
        $this->charger = $charger;
        $this->battery = $this->charger->getBattery();
    }

    public function recharge(): void
    {
        $this->battery->setTimesCharged($this->battery->getTimesCharged() + 1);
        $chargingTime = $this->battery->getChargingTime();
        $chargePerUnit = 100 / $chargingTime;
        $currBatteryLevel = (int)$this->battery->getBattery();
        echo "\nCharging battery \n";
        for ($i = $currBatteryLevel; $i <= $chargingTime; $i++) {
            echo "Battery Charging : " . (int)$chargePerUnit * $i . "%\r";
            sleep(1);
        }
        $this->battery->setBattery($this->battery->getBatteryMaxCapacity());
        echo "Battery Charged : 100%\n";
    }

    public function chargeBatteryIfEmpty() : void
    {
        if ($this->battery->isBatteryEmpty()) {
            $this->recharge();
        }
    }

    public function useBattery($cost): void
    {
        while ($cost > 0) {
            $this->chargeBatteryIfEmpty();
            $this->battery->setBattery($this->battery->getBattery() - 1);
            $cost--;
            sleep(1);
        }
    }
}
