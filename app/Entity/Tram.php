<?php

namespace App\Entity;

use App\Interfaces\Tram\TramDataInterface;
use App\Interfaces\Tram\TramInterface;

/**
 * App\Entity\Tram
 *
 * @property string $stateNumber
 * @property Route $route
 * @property int $numberOfSeats
 * @property int $numberOfBusySeats
 * @property Driver $driver
 * @property int $yearOfIssue
 * @property string $tramStation
 * @property array $doorsList
 *
 */
class Tram implements TramInterface
{
    protected string $stateNumber;
    protected Route $route;
    protected int $numberOfSeats;
    protected int $numberOfBusySeats = 0;
    protected Driver $driver;
    protected int $yearOfIssue;
    public string $tramStation;

    public array $doorsList = [
        false,
        false,
        false
    ];

    public function __construct(TramDataInterface $tramData)
    {
        $this->stateNumber      = $tramData->getStateNumber();
        $this->numberOfSeats    = $tramData->getNumberOfSeats();
        $this->yearOfIssue      = $tramData->getYearOfIssue();
    }

    public function setDriver(Driver $driver): Tram
    {
        $this->driver = $driver;

        return $this;
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    public function setRoute(Route $route): Tram
    {
        $this->route = $route;

        return $this;
    }

    public function getRoute(): Route
    {
        return $this->route;
    }

    public function moveToStation(): void
    {
        $this->tramStation = $this->route->getCurrentStation();
    }
    public function move(): void
    {
        $this->route->incrementingStationNumber();
    }

    public function openAllDoors(): void
    {
        foreach ($this->doorsList as $key => $door) {
            $this->doorsList[$key] = true;
        }
    }

    public function openDoor(int $doorNumber): void
    {
        if (isset($this->doorsList[$doorNumber])) {
            $this->doorsList[$doorNumber] = true;
        }
    }

    public function closeAllDoors()
    {
        foreach ($this->doorsList as $key => $door) {
            $this->doorsList[$key] = false;
        }
    }

    public function closeDoor(int $doorNumber)
    {
        if (isset($this->doorsList[$doorNumber])) {
            $this->doorsList[$doorNumber] = false;
        }
    }

    public function getNumberOfSeats(): int
    {
        return $this->numberOfSeats;
    }

    public function getNumberOfFreeSeats(): int
    {
        return $this->numberOfSeats - $this->numberOfBusySeats;
    }

    public function getNumberOfBusySeats(): int
    {
        return $this->numberOfBusySeats;
    }

    public function incrementingNumberOfBusySeats(int $addVisitors): void
    {
        if($this->numberOfBusySeats + $addVisitors >= $this->numberOfSeats) {
            $this->numberOfBusySeats = $this->numberOfSeats;
        } else {
            $this->numberOfBusySeats += $addVisitors;
        }

    }

    public function decrementingNumberOfBusySeats(int $removeVisitors)
    {
        if($this->numberOfBusySeats - $removeVisitors <= 0) {
            $this->numberOfBusySeats = 0;
        } else {
            $this->numberOfBusySeats -= $removeVisitors;
        }
    }

}