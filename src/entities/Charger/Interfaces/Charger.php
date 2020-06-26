<?php
namespace App\entities\Charger\Interfaces;

use App\entities\Battery\Interfaces\Battery;

interface Charger
{
    public function setBattery(Battery $battery): void;
}
