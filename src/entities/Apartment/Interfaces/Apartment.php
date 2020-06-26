<?php
namespace App\entities\Apartment\Interfaces;

use App\entities\Floor\Interfaces\Floor;

interface Apartment
{
    public function setFloor(Floor $floorType): void;
    public function getFloor(): Floor;
}
