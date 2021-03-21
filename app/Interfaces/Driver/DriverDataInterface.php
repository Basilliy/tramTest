<?php

namespace App\Interfaces\Driver;

interface DriverDataInterface
{
    public function __construct(string $firstName, string $secondName, int $age);

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @return string
     */
    public function getSecondName(): string;

    /**
     * @return int
     */
    public function getAge(): int;
}