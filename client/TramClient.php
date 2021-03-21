<?php

namespace Client;

use App\DTO\DriverDTO;
use App\DTO\RouteDTO;
use App\DTO\TramDTO;
use App\Entity\Driver;
use App\Entity\Route;
use App\Entity\Tram;

/**
 * Client\TramClient
 *
 * @property Tram $tram
 * @property Route $route
 * @property Driver $driver
 *
 */
class TramClient
{
    protected Tram $tram;
    protected Route $route;
    protected Driver $driver;

    /**
     * @param Tram $tram
     * @return TramClient
     */
    public function setTram(Tram $tram): TramClient
    {
        $this->tram = $tram;

        return $this;
    }

    /**
     * @return Tram
     */
    public function getTram(): Tram
    {
        return $this->tram;
    }

    private function prepareTram(): void
    {
        $tramDTO   = new TramDTO('AB0683CP', 50, 2018);
        $this->tram = new Tram($tramDTO);
        $this->tram->setDriver($this->driver)
                   ->setRoute($this->route);
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    /**
     * @param Driver $driver
     * @return TramClient
     */
    public function setDriver(Driver $driver): TramClient
    {
        $this->driver = $driver;

        return $this;
    }

    private function prepareDriver(): void
    {
        $driverDTO = new DriverDTO('user', 'test', 28);
        $this->driver = new Driver($driverDTO);
    }

    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @param Route $route
     * @return TramClient
     */
    public function setRoute(Route $route): TramClient
    {
        $this->route = $route;

        return $this;
    }

    private function prepareRoute()
    {
        $routeDTO  = new RouteDTO('first', 1, ['first station', 'second station', 'third station']);
        $this->route  = new Route($routeDTO);
    }

    public function prepareData()
    {
        $this->prepareDriver();
        $this->prepareRoute();
        $this->prepareTram();
    }

    public function runTram(): void
    {
        $round = 1;

        do {

            $this->tram->moveToStation();
            $this->tram->openDoor(0);
            $this->tram->openAllDoors();
            $this->tram->decrementingNumberOfBusySeats(mt_rand(0, $this->tram->getNumberOfBusySeats()));
            $this->tram->incrementingNumberOfBusySeats(mt_rand(0, $this->tram->getNumberOfFreeSeats()));
            $this->tram->closeAllDoors();

            if ($round < $this->route->getStationCount()) {
                $this->tram->move();
            }

            $round++;

        } while($round <= $this->route->getStationCount());

    }

}