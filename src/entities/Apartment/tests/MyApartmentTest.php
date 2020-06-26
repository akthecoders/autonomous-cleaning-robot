<?php

use PHPUnit\Framework\TestCase;
use App\entities\Apartment\MyApartment;
use App\entities\Floor\CarpetFloor;
use App\entities\Floor\HardFloor;

class MyApartmentTest extends TestCase
{
    private $myApartment;
    
    protected function setUp(): void
    {
        $this->myApartment = new MyApartment();
    }

    protected function tearDown(): void
    {
        unset($this->myApartment);
    }

    public function testCarpetSetArea(): void
    {
        $floor = new CarpetFloor();
        $this->myApartment->setFloor($floor);
        $this->assertInstanceOf(CarpetFloor::class, $this->myApartment->getFloor());
    }

    public function testCarpetGetFloor(): void
    {
        $floor = new CarpetFloor();
        $this->myApartment->setFloor($floor);
        $this->assertInstanceOf(CarpetFloor::class, $this->myApartment->getFloor());
    }

    public function testHardSetArea(): void
    {
        $floor = new HardFloor();
        $this->myApartment->setFloor($floor);
        $this->assertInstanceOf(HardFloor::class, $this->myApartment->getFloor());
    }

    public function testHardGetFloor(): void
    {
        $floor = new HardFloor();
        $this->myApartment->setFloor($floor);
        $this->assertInstanceOf(HardFloor::class, $this->myApartment->getFloor());
    }
}
