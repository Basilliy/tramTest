<?php

namespace Test;

use App\DTO\DriverDTO;
use App\DTO\RouteDTO;
use App\DTO\TramDTO;
use App\Entity\Driver;
use App\Entity\Route;
use App\Entity\Tram;
use Client\TramClient;
use PHPUnit\Framework\TestCase;

class TramClientTest extends TestCase
{
    public function testTramClientTramSet()
    {
        $client = new TramClient();
        $tram   = $this->formBaseTram();
        $client->setTram($tram);
        $this->assertEquals($tram, $client->getTram());
    }

    public function testTramClientTramGet()
    {
        $client = new TramClient();
        $tram   = $this->formBaseTram();
        $client->setTram($tram);
        $this->assertEquals($tram, $client->getTram());
    }

    public function testTramClientTramPrepare()
    {
        $client = new TramClient();
        $client->prepareData();
        $this->assertNotNull($client->getTram());
    }

    public function testTramClientDriverSet()
    {
        $client = new TramClient();
        $driver = $this->formBaseDriver();
        $client->setDriver($driver);
        $this->assertEquals($driver, $client->getDriver());
    }

    public function testTramClientDriverGet()
    {
        $client = new TramClient();
        $driver = $this->formBaseDriver();
        $client->setDriver($driver);
        $this->assertEquals($driver, $client->getDriver());
    }

    public function testTramClientDriverPrepare()
    {
        $client = new TramClient();
        $client->prepareData();
        $this->assertNotNull($client->getDriver());
    }

    public function testTramClientRouteSet()
    {
        $client = new TramClient();
        $route  = $this->formBaseRoute();
        $client->setRoute($route);
        $this->assertEquals($route, $client->getRoute());
    }

    public function testTramClientRouteGet()
    {
        $client = new TramClient();
        $route  = $this->formBaseRoute();
        $client->setRoute($route);
        $this->assertEquals($route, $client->getRoute());
    }

    public function testTramClientRoutePrepare()
    {
        $client = new TramClient();
        $client->prepareData();
        $this->assertNotNull($client->getRoute());
    }

    public function testTramClientPrepareData()
    {
        $client = new TramClient();
        $client->prepareData();
        $this->assertNotNull($client->getRoute());
        $this->assertNotNull($client->getDriver());
        $this->assertNotNull($client->getTram());
    }

    public function testTramClientRunTram()
    {
        $client = new TramClient();
        $client->prepareData();

        $tramRoute = $client->getRoute()->stationList;

        $client->runTram();

        $this->assertEquals($tramRoute[count($tramRoute) - 1], $client->getRoute()->getCurrentStation());
    }

    private function formBaseTram(): Tram
    {
        $tramDTO   = new TramDTO('AB0683CP', 50, 2018);

        return new Tram($tramDTO);
    }

    private function formBaseDriver(): Driver
    {
        $driverDTO = $driverDTO = new DriverDTO('user', 'test', 28);;
        return new Driver($driverDTO);
    }

    private function formBaseRoute(): Route
    {
        $routeDTO  = new RouteDTO('first', 1, ['first station', 'second station', 'third station']);
        return new Route($routeDTO);
    }
}