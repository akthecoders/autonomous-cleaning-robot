<?php

require __DIR__ . '/vendor/autoload.php';

use App\helpers\helper;
use App\entities\Robot\RobotFactory;
use App\entities\Apartment\ApartmentFactory;
use App\entities\Floor\FloorFactory;
use App\entities\Battery\MiniBattery;
use App\entities\Charger\FastCharger;
use App\services\CleanerService;
use App\services\RechargeService;

$settings = Helper::initialize($argv);
$resourceValidity = Helper::resourceValidityCheck($settings);
if ($resourceValidity['status'] == false) {
    echo $resourceValidity["message"] . "\n";
    die();
}

$floor = FloorFactory::build($settings['floorType']);
$floor->setArea($settings['area']);

$apartment = ApartmentFactory::build('My');
$apartment->setFloor($floor);

$miniBattery = new MiniBattery();
$miniBattery->setBatteryMaxCapacity(60);
$miniBattery->setChargingTime(30);
$miniBattery->setTimesCharged(0);
$miniBattery->setBattery(60);

$fastCharger = new FastCharger();
$fastCharger->setBattery($miniBattery);

$robot = RobotFactory::build('Cleaner');
$robot->setBattery($miniBattery);
$robot->setCharger($fastCharger);

$rechargeServices = new RechargeService($fastCharger);

$cleaner = new CleanerService($apartment, $robot, $rechargeServices);
$cleaningTime = $cleaner->clean();

$display = [
    'cleaningTime' => $cleaningTime,
    'chargingTime' => ($miniBattery->getTimesCharged() * $miniBattery->getChargingTime()),
    'chargedTimes' => $miniBattery->getTimesCharged(),
    'batteryRemaining' => $miniBattery->getBattery(),
];

echo "\n\n";
echo "Time Spent on cleaning   : " . $display['cleaningTime'] . " seconds\n";
echo "Time Spent on charging   : " . $display['chargingTime'] . " seconds\n";
echo "Total Time               : " . ($display['chargingTime'] + $display['cleaningTime']) . " seconds\n";
echo "Time Charged             : " . $display['chargedTimes'] . " times\n";
echo "Battery remaining        : " . $display['batteryRemaining'] . " seconds\n";
echo "\nEvery Task Compeleted !\n";
echo "\n";
