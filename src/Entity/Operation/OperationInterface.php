<?php

namespace App\Entity\Operation;

interface OperationInterface
{
    public function operate(float $firstNumber, float $secondNumber): float;
}