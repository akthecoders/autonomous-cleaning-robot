<?php

use PHPUnit\Framework\TestCase;
use App\entities\Apartment\ApartmentFactory;
use App\entities\Apartment\MyApartment;

class ApartmentFactoryTest extends TestCase
{
    public function testMyApartmentCreation(): void
    {
        $myApartment = ApartmentFactory::build('My');
        $this->assertInstanceOf(MyApartment::class, $myApartment);
    }
}
