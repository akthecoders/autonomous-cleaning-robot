<?php

namespace App\entities\Battery;

use App\entities\Battery\Interfaces\Battery;

class MiniBattery implements Battery
{
    private $chargingTime = 30;
    private $batteryMaxCapacity = 60;
    private $timesCharged = 0;
    private $currBatteryLevel = 60;

    public function setBatteryMaxCapacity(int $batteryCapacity): void
    {
        $this->batteryMaxCapacity = $batteryCapacity;
    }

    public function getBatteryMaxCapacity(): int
    {
        return $this->batteryMaxCapacity;
    }

    public function setChargingTime(int $time): void
    {
        $this->chargingTime = $time;
    }

    public function getChargingTime(): int
    {
        return $this->chargingTime;
    }

    public function setBattery(int $currBatteryLevel): void
    {
        $this->currBatteryLevel = $currBatteryLevel;
    }

    public function getBattery(): int
    {
        return $this->currBatteryLevel;
    }

    public function getTimesCharged(): int
    {
        return $this->timesCharged;
    }

    public function setTimesCharged(int $timesCharged): void
    {
        $this->timesCharged = $timesCharged;
    }

    public function isBatteryEmpty(): bool
    {
        return $this->currBatteryLevel <= 0 ? true : false;
    }
}
