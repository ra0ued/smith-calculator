<?php

namespace App\Controller;

use App\DependencyInjection\Calculator;
use App\Form\Type\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @param Calculator $calculator
     * @param Request $request
     * @return Response
     * @Route("/calculator", methods={"GET", "POST"})
     */
    public function calculator(Calculator $calculator, Request $request): Response
    {
        $form = $this->createForm(CalculatorType::class, $calculator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $calculator = $form->getData();

            /** @var Calculator $calculator */
            $result = $calculator->calculate();

            return $this->render('calculator/index.html.twig', [
                    'form' => $form->createView(),
                    'result' => $result
                ]
            );
        }

        return $this->render('calculator/index.html.twig', ['form' => $form->createView()]);
    }
}