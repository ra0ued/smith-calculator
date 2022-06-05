<?php

namespace App\Entity\Operation;

class Subtract implements OperationInterface
{
    public function operate(float $firstNumber, float $secondNumber): float
    {
        return $firstNumber - $secondNumber;
    }
}