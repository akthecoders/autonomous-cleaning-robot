<?php

namespace App\entities\Charger;

use App\entities\Charger\Interfaces\Charger;
use App\entities\Battery\Interfaces\Battery;

class FastCharger implements Charger
{
    private $battery;

    public function setBattery(Battery $battery): void
    {
        $this->battery = $battery;
    }

    public function getBattery(): Battery
    {
        return $this->battery;
    }
}
