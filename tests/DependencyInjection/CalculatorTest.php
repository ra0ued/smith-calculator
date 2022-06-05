<?php

namespace App\Tests\DependencyInjection;

use App\DependencyInjection\Calculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorTest extends KernelTestCase
{
    /**
     * @dataProvider operationProvider
     */
    public function testSuccess(float $firstNumber, string $operand, float $secondNumber, $expected): void
    {
        self::bootKernel();

        $container = static::getContainer();

        /** @var Calculator $calculator */
        $calculator = $container->get(Calculator::class);

        $calculator->setFirstNumber($firstNumber);
        $calculator->setOperand($operand);
        $calculator->setSecondNumber($secondNumber);
        $result = $calculator->calculate();

        $this->assertEquals($expected, $result);
    }

    public function operationProvider(): array
    {
        return [
            [2, 'add', 2, 4],
            [2, 'subtract', 2, 0],
            [2, 'multiply', 2, 4],
            [65635, 'multiply', 65635, 4307953225],
            [2, 'divide', 2, 1],
            [2, 'divide', 0, 'Division by zero cannot be executed'],
        ];
    }
}