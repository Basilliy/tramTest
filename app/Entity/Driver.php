<?php

namespace App\Entity;

use App\Interfaces\Driver\DriverDataInterface;

/**
 * App\Entity\Driver
 *
 * @property string $firstName
 * @property string $secondName
 * @property int $age
 *
 */
class Driver
{
    protected string $firstName;
    protected string $secondName;
    protected int $age;

    public function __construct(DriverDataInterface $driverDTO)
    {
        $this->firstName    = $driverDTO->getFirstName();
        $this->secondName   = $driverDTO->getSecondName();
        $this->age          = $driverDTO->getAge();
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getSecondName(): string
    {
        return $this->secondName;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}