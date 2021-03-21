<?php

namespace App\DTO;

use App\Interfaces\Route\RouteDataInterface;

/**
 * App\DTO\RouteDTO
 *
 * @property string $routeName
 * @property int $routeNumber
 * @property array $stationList
 *
 */
class RouteDTO implements RouteDataInterface
{

    protected string $routeName;

    protected int $routeNumber;

    protected array $stationList;

    public function __construct(string $routeName, int $routeNumber, array $stationList)
    {
        $this->routeName    = $routeName;
        $this->routeNumber  = $routeNumber;
        $this->stationList  = $stationList;
    }

    /**
     * @return array
     */
    public function getStationList(): array
    {
        return $this->stationList;
    }

    /**
     * @return int
     */
    public function getRouteNumber(): int
    {
        return $this->routeNumber;
    }

    /**
     * @return string
     */
    public function getRouteName(): string
    {
        return $this->routeName;
    }
}