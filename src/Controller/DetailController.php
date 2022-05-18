<?php

namespace App\Controller;

use App\Form\AddToCartType;
use App\Repository\PizzaRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/detail/{id}", name="app_detail")
     */
    public function index($id, PizzaRepository $pizzaRepository, SessionInterface $session, Request $request): Response
    {
        $pizza = $pizzaRepository->find($id);
        $form = $this->createForm(AddToCartType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $session->set("pizza", $id);
            return $this->redirectToRoute("app_order");
        }

        return $this->renderForm('detail/index.html.twig', [
            'form' => $form,
            'pizza' => $pizza,
        ]);
    }
}
