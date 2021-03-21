<?php

namespace App\DTO;

use App\Interfaces\Tram\TramDataInterface;

/**
 * App\DTO\TramDTO
 *
 * @property string $stateNumber
 * @property int $numberOfSeats
 * @property int $yearOfIssue
 *
 */
class TramDTO implements TramDataInterface
{
    protected string $stateNumber;

    protected int $numberOfSeats;

    protected int $yearOfIssue;

    public function __construct(string $stateNumber, int $numberOfSeats, int $yearOfIssue)
    {
        $this->stateNumber      = $stateNumber;
        $this->numberOfSeats    = $numberOfSeats;
        $this->yearOfIssue      = $yearOfIssue;
    }

    public function getStateNumber(): string
    {
        return $this->stateNumber;
    }

    public function getNumberOfSeats(): int
    {
        return $this->numberOfSeats;
    }

    public function getYearOfIssue(): int
    {
        return $this->yearOfIssue;
    }
}