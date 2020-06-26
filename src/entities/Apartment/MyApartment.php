<?php
namespace App\entities\Apartment;

use App\entities\Floor\Interfaces\Floor;
use App\entities\Apartment\Interfaces\Apartment;

class MyApartment implements Apartment
{
    private $floor;

    public function setFloor(Floor $floorType): void
    {
        $this->floor = $floorType;
    }

    public function getFloor(): Floor
    {
        return $this->floor;
    }
}
