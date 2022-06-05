<?php

namespace App\Entity\Operation;

use App\Exception\OperationNotImplementedException;
use Exception;

class OperationFactory
{
    /**
     * @throws Exception
     */
    public function getOperation(string $type): OperationInterface|null
    {
        switch ($type) {
            case 'add':
                $operation = new Add();
                break;
            case 'subtract':
                $operation = new Subtract();
                break;
            case 'multiply':
                $operation = new Multiply();
                break;
            case 'divide':
                $operation = new Divide();
                break;
            default:
                throw new OperationNotImplementedException('Operation of type ' . $type . ' is not implemented yet.');
        }

        return $operation;
    }
}