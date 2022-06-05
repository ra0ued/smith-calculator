<?php

namespace App\DependencyInjection;

use App\Entity\Operation\OperationFactory;
use Exception;
use Symfony\Component\Validator\Constraints as Assert;

class Calculator
{
    const OPERATIONS = [
        'add',
        'subtract',
        'multiply',
        'divide'
    ];

    /**
     * @var float $firstNumber
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private float $firstNumber;

    /**
     * @var float $secondNumber
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private float $secondNumber;

    /**
     * @var string $operand
     * @Assert\NotBlank
     * @Assert\Choice(choices=Calculator::OPERATIONS, message="Choose a valid operation.")
     */
    private string $operand;

    /**
     * @var OperationFactory
     */
    private OperationFactory $operationFactory;

    /**
     * @param OperationFactory $operationFactory
     */
    public function __construct(OperationFactory $operationFactory)
    {
        $this->operationFactory = $operationFactory;
    }

    /**
     * @return float
     */
    public function getFirstNumber(): float
    {
        return $this->firstNumber;
    }

    /**
     * @param float $firstNumber
     */
    public function setFirstNumber(float $firstNumber): void
    {
        $this->firstNumber = $firstNumber;
    }

    /**
     * @return float
     */
    public function getSecondNumber(): float
    {
        return $this->secondNumber;
    }

    /**
     * @param float $secondNumber
     */
    public function setSecondNumber(float $secondNumber): void
    {
        $this->secondNumber = $secondNumber;
    }

    /**
     * @return string
     */
    public function getOperand(): string
    {
        return $this->operand;
    }

    /**
     * @param string $operand
     */
    public function setOperand(string $operand): void
    {
        $this->operand = $operand;
    }

    public function calculate(): float|string
    {
        try {
            return $this->operationFactory->getOperation($this->getOperand())->operate($this->getFirstNumber(), $this->getSecondNumber());
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}