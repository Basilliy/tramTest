<?php

namespace Test;

use App\DTO\DriverDTO;
use App\DTO\RouteDTO;
use App\DTO\TramDTO;
use App\Entity\Driver;
use App\Entity\Route;
use App\Entity\Tram;
use PHPUnit\Framework\TestCase;

class TramTest extends TestCase
{

    public function testTramRouteSet()
    {
        $tram = $this->formBaseTram();

        $routeDTO  = new RouteDTO('first', 1, ['first station']);
        $route  = new Route($routeDTO);
        $tram->setRoute($route);

        $this->assertEquals($route, $tram->getRoute());
    }

    public function testTramRouteGet()
    {
        $tram = $this->formBaseTram();

        $routeDTO  = new RouteDTO('first', 1, ['first station']);
        $route  = new Route($routeDTO);
        $tram->setRoute($route);

        $this->assertEquals($route, $tram->getRoute());
    }

    public function testTramDriverSet()
    {
        $tram = $this->formBaseTram();

        $driverDTO = new DriverDTO('user', 'test', 28);
        $driver = new Driver($driverDTO);

        $tram->setDriver($driver);

        $this->assertEquals($driver, $tram->getDriver());
    }

    public function testTramDriverGet()
    {
        $tram = $this->formBaseTram();

        $driverDTO = new DriverDTO('user', 'test', 28);
        $driver = new Driver($driverDTO);

        $tram->setDriver($driver);

        $this->assertEquals($driver, $tram->getDriver());
    }

    public function testTramMoveToStation()
    {
        $tram = $this->formBaseTram();

        $routeDTO  = new RouteDTO('first', 1, ['first station', 'third station']);
        $route  = new Route($routeDTO);

        $tram->setRoute($route);
        $tram->moveToStation();

        $tramRoute = $tram->getRoute();

        $this->assertEquals($tram->tramStation, $tramRoute->getCurrentStation());
    }

    public function testTramMove()
    {
        $tram = $this->formBaseTram();

        $routeDTO  = new RouteDTO('first', 1, ['first station', 'third station']);
        $route  = new Route($routeDTO);
        $driverDTO = new DriverDTO('user', 'test', 28);
        $driver = new Driver($driverDTO);

        $tram->setDriver($driver)
            ->setRoute($route);

        $startStation = $route->getCurrentStationNumber();

        $tram->move();

        $tramRoute = $tram->getRoute();

        $newStation = $tramRoute->getCurrentStationNumber();

        $this->assertEquals($startStation + 1, $newStation);

    }

    public function testTramOpenAllDoors()
    {
        $tram = $this->formBaseTram();

        $tram->closeAllDoors();
        $tram->openAllDoors();

        $this->assertEquals([true, true, true], $tram->doorsList);
    }

    public function testTramOpenDoor()
    {
        $tram = $this->formBaseTram();

        $tram->closeAllDoors();

        $doorNumber = 0;
        $tram->openDoor($doorNumber);

        $this->assertEquals(true, $tram->doorsList[$doorNumber]);
    }

    public function testTramCloseAllDoors()
    {
        $tram = $this->formBaseTram();

        $tram->openAllDoors();
        $tram->closeAllDoors();

        $this->assertEquals([false, false, false], $tram->doorsList);
    }

    public function testTramCloseDoor()
    {
        $tram = $this->formBaseTram();

        $tram->openAllDoors();

        $doorNumber = 0;
        $tram->closeDoor($doorNumber);

        $this->assertEquals(false, $tram->doorsList[$doorNumber]);
    }

    public function testTramNumberOfSeatsGet()
    {
        $tram = $this->formBaseTram();

        $this->assertEquals(50, $tram->getNumberOfSeats());
    }

    public function testTramNumberOfFreeSeatsGet()
    {
        $tram = $this->formBaseTram();

        $this->assertEquals($tram->getNumberOfFreeSeats(), $tram->getNumberOfSeats() - $tram->getNumberOfBusySeats());
    }

    public function testTramNumberOfBusySeatsGet()
    {
        $tram = $this->formBaseTram();

        $this->assertEquals($tram->getNumberOfBusySeats(), $tram->getNumberOfSeats() - $tram->getNumberOfFreeSeats());
    }

    public function testTramIncrementingNumberOfBusySeats()
    {
        $tram = $this->formBaseTram();

        $newVisitors = 20;

        $tram->incrementingNumberOfBusySeats($newVisitors);

        $this->assertEquals($tram->getNumberOfBusySeats(), $newVisitors);
    }

    public function testTramDecrementingNumberOfBusySeats()
    {
        $tram = $this->formBaseTram();

        $tram->incrementingNumberOfBusySeats(20);

        $tram->decrementingNumberOfBusySeats(15);

        $this->assertEquals($tram->getNumberOfBusySeats(), 5);
    }

    private function formBaseTram(): Tram
    {
        $tramDTO   = new TramDTO('AB0683CP', 50, 2018);

        return new Tram($tramDTO);
    }
}