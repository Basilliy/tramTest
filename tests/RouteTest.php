<?php

namespace Test;

use App\DTO\RouteDTO;
use App\Entity\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    protected string $number = '1';
    protected string $name = 'first';
    protected array $stationList = [
        'first station',
        'new station',
        'test station'
    ];

    public function testRouteCurrentStationGet()
    {
        $route = $this->formBaseRoute();

        $this->assertEquals($this->stationList[$route->getCurrentStationNumber()], $route->getCurrentStation());
    }

    public function testRouteNextStationGet()
    {
        $route = $this->formBaseRoute();

        $currentStationNumber = $route->getCurrentStationNumber();

        if (isset($this->stationList[$currentStationNumber + 1])) {
            $this->assertEquals($this->stationList[$currentStationNumber + 1], $route->getNextStation());
        } else {
            $this->assertEquals(null, $route->getNextStation());
        }
    }

    public function testRouteStationCountGet()
    {
        $route = $this->formBaseRoute();

        $this->assertEquals(count($this->stationList), $route->getStationCount());
    }

    public function testRouteCurrentStationNumberGet()
    {
        $route = $this->formBaseRoute();

        $stationList = array_flip($this->stationList);

        $this->assertEquals($stationList[$route->getCurrentStation()], $route->getCurrentStationNumber());
    }

    public function testRouteIncrementingStationNumber()
    {
        $route = $this->formBaseRoute();

        $startStation = $route->getCurrentStationNumber();

        $route->incrementingStationNumber();

        if ($startStation + 1 > $route->getStationCount()) {
            $this->assertEquals($route->getStationCount(), $route->getCurrentStationNumber());
        } else {
            $this->assertEquals($startStation + 1, $route->getCurrentStationNumber());
        }
    }

    private function formBaseRoute(): Route
    {
        $routeDTO  = new RouteDTO($this->name, $this->number, $this->stationList);
        return new Route($routeDTO);
    }
}