<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdersController extends AbstractController
{
    /**
     * @Route("/orders", name="app_orders")
     */
    public function index(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findAll();


        return $this->render('orders/index.html.twig', [
            'orders' => $orders,
        ]);
    }
}
