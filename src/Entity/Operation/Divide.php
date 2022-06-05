<?php

namespace App\Entity\Operation;

use App\Exception\DivisionByZeroException;
use Exception;

class Divide implements OperationInterface
{
    /**
     * @throws Exception
     */
    public function operate(float $firstNumber, float $secondNumber): float
    {
        if ($secondNumber == 0) {
            throw new DivisionByZeroException('Division by zero cannot be executed');
        }

        return $firstNumber / $secondNumber;
    }
}