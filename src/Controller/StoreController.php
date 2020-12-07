<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Books;

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
     * @Route("/Books/{id}", name="details")
     */
    public function details($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Books::class);
        $book = $repo->find($id);

        return $this->render('store/details.html.twig', [
            'book' => $book
        ]);
    }

    /**
     * @Route("/Books", name="books")
     */
    public function books(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Books::class);
        $books = $repo->findAll();


        return $this->render('store/books.html.twig', [
            'controller_name' => 'StoreController',
            'books' => $books
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
