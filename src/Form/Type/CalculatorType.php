<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstNumber', TextType::class, [
                'required' => true
            ])
            ->add('operand', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    '+' => 'add',
                    '-' => 'subtract',
                    '*' => 'multiply',
                    '/' => 'divide',
                    '%' => 'modulo'
                ]
            ])
            ->add('secondNumber', TextType::class, [
                'required' => true
            ])
            ->add('Calculate', SubmitType::class);
    }
}