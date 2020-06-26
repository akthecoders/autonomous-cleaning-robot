<?php

use PHPUnit\Framework\TestCase;
use App\entities\Charger\FastCharger;
use App\entities\Floor\CarpetFloor;
use App\entities\Apartment\MyApartment;
use App\entities\Battery\MiniBattery;
use App\entities\Robot\CleanerRobot;
use App\services\CleanerService;
use App\services\RechargeService;
use App\entities\Robot\RobotFactory;
use App\entities\Apartment\ApartmentFactory;
use App\entities\Floor\FloorFactory;

class CleanerServiceTest extends TestCase
{
    public function testClean(): void
    {
        $floor = $this->createMock(CarpetFloor::class);
        $floor->method('getArea')
              ->willReturn(10);
        
        $floor->method('getCleaningCost')
              ->willReturn(1);

        $apartment = $this->createMock(MyApartment::class);
        $apartment->expects($this->exactly(2))
                  ->method('getFloor')
                  ->willReturn($floor);

        $miniBattery = $this->createMock(MiniBattery::class);

        $miniBattery->method('getBatteryMaxCapacity')
                    ->willReturn(60);

        $miniBattery->method('setBattery');

        $miniBattery->method('isBatteryEmpty')
                    ->willReturn(false);

        $miniBattery->method('getChargingTime')
                    ->willReturn(30);

        $miniBattery->method('getBattery')
                    ->willReturn(60);

        $miniBattery->method('getTimesCharged')
                    ->willReturn(0);

        $charger = $this->createMock(FastCharger::class);
        $charger->method('getBattery')->willReturn($miniBattery);
        
        $cleanerRobot = new CleanerRobot();
        $cleanerRobot->setBattery($miniBattery);
        $cleanerRobot->setCharger($charger);

        $rechargeService = $this->getMockBuilder(RechargeService::class)
                                ->setConstructorArgs([$charger])
                                ->setMethods(null)
                                ->getMock();

        $cleaningService = new CleanerService($apartment, $cleanerRobot, $rechargeService);
        $this->assertEquals(10, $cleaningService->clean());
    }
}
