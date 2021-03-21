<?php

namespace App\DTO;

use App\Interfaces\Driver\DriverDataInterface;

/**
 * App\DTO\DriverDTO
 *
 * @property string $firstName
 * @property string $secondName
 * @property int $age
 *
 */
class DriverDTO implements DriverDataInterface
{
    public string $firstName;
    public string $secondName;
    public int $age;

    public function __construct(string $firstName, string $secondName, int $age)
    {
        $this->firstName    = $firstName;
        $this->secondName   = $secondName;
        $this->age          = $age;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}