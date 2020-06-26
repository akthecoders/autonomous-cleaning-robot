<?php
namespace App\entities\Robot\Interfaces;

interface RobotCost
{
    public function setCleaningCost(int $cost) : void;
    public function getCleaningCost(): int;
}
