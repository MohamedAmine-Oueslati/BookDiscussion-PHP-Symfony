<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    /**
     * @Route("/Login", name="login")
     */
    public function login(): Response
    {
        return $this->render('store/login.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }

    /**
     * @Route("/Books/1", name="details")
     */
    public function details(): Response
    {
        return $this->render('store/details.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }

    /**
     * @Route("/Books", name="books")
     */
    public function books(): Response
    {
        return $this->render('store/books.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }

    /**
     * @Route("/Orders", name="orders")
     */
    public function orders(): Response
    {
        return $this->render('store/orders.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }

    /**
     * @Route("/Cart", name="cart")
     */
    public function cart(): Response
    {
        return $this->render('store/cart.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('store/home.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }
}
