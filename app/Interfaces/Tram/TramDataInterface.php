<?php

namespace App\Interfaces\Tram;

interface TramDataInterface
{
    public function __construct(string $stateNumber, int $numberOfSeats, int $yearOfIssue);

    /**
     * @return string
     */
    public function getStateNumber(): string;

    /**
     * @return int
     */
    public function getNumberOfSeats(): int;

    /**
     * @return int
     */
    public function getYearOfIssue(): int;
}