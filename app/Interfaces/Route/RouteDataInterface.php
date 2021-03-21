<?php

namespace App\Interfaces\Route;

interface RouteDataInterface
{
    public function __construct(string $routeName, int $routeNumber, array $stationList);

    /**
     * @return array
     */
    public function getStationList(): array;

    /**
     * @return int
     */
    public function getRouteNumber(): int;

    /**
     * @return string
     */
    public function getRouteName(): string;
}