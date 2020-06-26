<?php

namespace App\services;

use App\entities\Apartment\Interfaces\Apartment;
use App\entities\Robot\Interfaces\Bot;
use App\services\RechargeService;

class CleanerService
{
    private $currAreaCleaned = 0;
    private $timeSpentOnCleaning = 0;
    private $battery;
    private $charger;
    private $rechargeService;

    public function __construct(Apartment $apartment, Bot $robot, RechargeService $rechargeService) {
        $this->apartment = $apartment;
        $this->robot = $robot;
        $this->battery = $robot->getBattery();
        $this->charger = $robot->getCharger();
        $this->rechargeService = $rechargeService;
    }

    public function clean(): int
    {
        $cleaningCost = $this->apartment->getFloor()->getCleaningCost();
        $totalArea = $this->apartment->getFloor()->getArea();
        $this->currAreaCleaned = 0;

        while ($this->currAreaCleaned < $totalArea) {
            $this->rechargeService->useBattery($cleaningCost);
            $this->timeSpentOnCleaning += $cleaningCost;
            $this->currAreaCleaned++;
            echo "Floor Apartment Cleaned : " . $this->currAreaCleaned . " m^2 \r";
        }

        return $this->timeSpentOnCleaning;
    }
}
