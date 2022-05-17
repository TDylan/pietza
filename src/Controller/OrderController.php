<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="app_order")
     */
    public function index(Request $request): Response
    {
        $Order = new Order();
        $form = $this -> createForm(OrderType::class,$Order);
        $form->handleRequest($request);
        if ($form -> isSubmitted() && $form -> isValid()){

        }

        return $this->renderForm('order/index.html.twig', [
            'form' => $form,
        ]);
    }
}
