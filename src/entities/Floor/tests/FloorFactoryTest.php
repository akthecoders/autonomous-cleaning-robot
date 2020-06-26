<?php

use PHPUnit\Framework\TestCase;
use App\entities\Floor\FloorFactory;
use App\entities\Floor\CarpetFloor;
use App\entities\Floor\HardFloor;

class FloorFactoryTest extends TestCase
{
    public function testCarpetFloorCreation(): void
    {
        $floor = FloorFactory::build('Carpet');
        $this->assertInstanceOf(CarpetFloor::class, $floor);
    }
    
    public function testHardFloorCreation(): void
    {
        $floor = FloorFactory::build('Hard');
        $this->assertInstanceOf(HardFloor::class, $floor);
    }
}
