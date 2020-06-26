<?php
namespace App\entities\Floor\Interfaces;

interface Floor
{
    public function setArea(int $area): void;

    public function getArea() : int;
}
