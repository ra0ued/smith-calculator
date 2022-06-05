<?php

namespace App\Entity\Operation;

class Add implements OperationInterface
{
    public function operate(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber + $secondNumber;
    }
}