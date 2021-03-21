<?php

namespace App\Interfaces\Route;

interface RouteInterface
{
    public function __construct(RouteDataInterface $routeData);

    /**
     * @return string
     */
    public function getCurrentStation(): ?string;

    /**
     * @return string|null
     */
    public function getNextStation(): ?string;
}