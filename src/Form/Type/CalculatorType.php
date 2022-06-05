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
                'required' => true,
                'label' => 'First Number',
                'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
            ])
            ->add('operand', ChoiceType::class, [
                'required' => true,
                'label' => 'Do',
                'attr' => [
                    'class' => 'form-select',
                ],
                'choices' => [
                    '+' => 'add',
                    '-' => 'subtract',
                    '*' => 'multiply',
                    '/' => 'divide',
                    '%' => 'modulo'
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
            ])
            ->add('secondNumber', TextType::class, [
                'required' => true,
                'label' => 'Second Number',
                'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'row_attr' => [
                    'class' => 'form-floating',
                ],
            ])
            ->add('calculate', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ]);
    }
}