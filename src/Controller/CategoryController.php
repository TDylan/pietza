<?php

namespace App\Controller;

use App\Repository\PizzaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="app_category",methods={"GET", "HEAD"})
     */
    public function index($id, PizzaRepository $pizzaRepository): Response
    {
        $pizzas = $pizzaRepository->findBy(array('category'=>$id));


        return $this->render('category/index.html.twig', [
            'pizzas' => $pizzas,
        ]);
    }
}
