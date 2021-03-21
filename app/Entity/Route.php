<?php

namespace App\Entity;

use App\Interfaces\Route\RouteDataInterface;
use App\Interfaces\Route\RouteInterface;

/**
 * App\Entity\Route
 *
 * @property string $number
 * @property string $name
 * @property array $stationList
 * @property int $currentStationNumber
 *
 */
class Route implements RouteInterface
{
    public string $number;
    public string $name;
    public array $stationList;
    public int $currentStationNumber = 0;

    public function __construct(RouteDataInterface $routeData)
    {
        $this->name         = $routeData->getRouteName();
        $this->number       = $routeData->getRouteNumber();
        $this->stationList  = $routeData->getStationList();
    }

    public function getCurrentStation(): ?string
    {
        return $this->stationList[$this->currentStationNumber] ?? null;
    }

    public function getNextStation(): ?string
    {
        return $this->stationList[$this->currentStationNumber + 1] ?? null;
    }

    public function getStationCount(): int
    {
        return count($this->stationList);
    }

    public function getCurrentStationNumber(): int
    {
        return $this->currentStationNumber;
    }

    public function incrementingStationNumber(): void
    {
        if($this->currentStationNumber + 1 <= $this->getStationCount()) {
            $this->currentStationNumber++;
        }
    }

}