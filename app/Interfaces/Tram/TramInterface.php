<?php

namespace App\Interfaces\Tram;

use App\DTO\TramDTO;
use App\Entity\Driver;

interface TramInterface
{
    public function __construct(TramDTO $tramDTO);

    /**
     * @param Driver $driver
     * @return mixed
     */
    public function setDriver(Driver $driver): TramInterface;

    /**
     * @return Driver
     */
    public function getDriver(): Driver;
}