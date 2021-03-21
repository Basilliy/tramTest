<?php

namespace Test;

use App\DTO\DriverDTO;
use App\Entity\Driver;
use PHPUnit\Framework\TestCase;

class DriverTest extends TestCase
{

    protected string $firstName = 'user';
    protected string $secondName = 'test';
    protected int $age = 28;

    public function testDriverFirstNameGet()
    {
        $driver = $this->formBaseDriver();

        $this->assertEquals($this->firstName, $driver->getFirstName());
    }

    public function testDriverSecondNameGet()
    {
        $driver = $this->formBaseDriver();

        $this->assertEquals($this->secondName, $driver->getSecondName());
    }

    public function testDriverAgeGet()
    {
        $driver = $this->formBaseDriver();

        $this->assertEquals($this->age, $driver->getAge());
    }

    private function formBaseDriver(): Driver
    {
        $driverDTO = new DriverDTO($this->firstName, $this->secondName, $this->age);
        return new Driver($driverDTO);
    }
}