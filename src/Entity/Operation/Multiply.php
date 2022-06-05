<?php

namespace App\Entity\Operation;

class Multiply implements OperationInterface
{
    public function operate(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber * $secondNumber;
    }
}