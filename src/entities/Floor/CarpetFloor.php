<?php
namespace App\entities\Floor;

use App\entities\Floor\Interfaces\Floor;
use App\entities\Robot\Interfaces\RobotCost;

class CarpetFloor implements Floor, RobotCost
{
    private $area = 0;
    private $cleaningCost = 2;

    public function setArea(int $area): void
    {
        $this->area = $area;
    }

    public function getArea(): int
    {
        return $this->area;
    }

    public function setCleaningCost(int $cost): void
    {
        $this->cleaningCost = $cost;
    }

    public function getCleaningCost(): int
    {
        return $this->cleaningCost;
    }
}
