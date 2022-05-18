<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use App\Repository\PizzaRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="app_order")
     */
    public function index(Request $request, ManagerRegistry $doctrine, SessionInterface $session, PizzaRepository $pizzaRepository): Response
    {
        $manager = $doctrine->getManager();
        dd($session->get('pizza'));
        $pizza = $pizzaRepository->find($session->get('pizza'));
        
        $Order = new Order();
        $form = $this -> createForm(OrderType::class,$Order);
        $form->handleRequest($request);
        if ($form -> isSubmitted() && $form -> isValid()){
            $Order->setPizza($pizza);
            $Order->setStatus('laden');
            $this->addFlash('succes', 'Je bestelling is geplaatst!');
            $manager->persist($Order);
            $manager->flush();
        }

        return $this->renderForm('order/index.html.twig', [
            'form' => $form,
        ]);
    }
}
