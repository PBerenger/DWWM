<?php
namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\Calculator;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $this->assertEquals(4, $calculator->add(2, 2));
        $this->assertEquals(0, $calculator->add(-1, 1));
    }
}