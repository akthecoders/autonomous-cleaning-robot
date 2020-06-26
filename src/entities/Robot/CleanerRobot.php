<?php
namespace App\entities\Robot;

use App\entities\Apartment\Interfaces\Apartment;
use App\entities\Robot\Interfaces\Bot;
use App\entities\Battery\Interfaces\Battery;
use App\entities\Charger\Interfaces\Charger;

class CleanerRobot implements Bot
{
    private $battery;
    private $charger;

    public function setBattery(Battery $battery): void
    {
        $this->battery = $battery;
    }

    public function getBattery() : Battery
    {
        return $this->battery;
    }

    public function setCharger(Charger $charger): void
    {
        $this->charger = $charger;
    }

    public function getCharger() : Charger
    {
        return $this->charger;
    }
}
