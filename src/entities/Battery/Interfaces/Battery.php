<?php
namespace App\entities\Battery\Interfaces;

interface Battery
{
    public function setBatteryMaxCapacity(int $batteryCapacity): void;

    public function getBatteryMaxCapacity(): int;

    public function setChargingTime(int $time): void;

    public function getChargingTime(): int;

    public function setBattery(int $currBatteryLevel): void;

    public function getBattery(): int;

    public function getTimesCharged(): int;

    public function setTimesCharged(int $timesCharged): void;

    public function isBatteryEmpty(): bool;
}
