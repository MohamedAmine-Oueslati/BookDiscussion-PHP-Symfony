<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LoginType;
use App\Form\RegisterType;
use App\Entity\Books;
use App\Entity\Users;

class StoreController extends AbstractController
{
    /**
     * @Route("/Register", name="register")
     */
    public function register(Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $user = new Users();
        $form = $this->createForm(RegisterType::class,$user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('books');
        }

        return $this->render('store/register.html.twig', [
            'formUser' => $form->createView(),
        ]);
    }

    /**
     * @Route("/Login", name="login")
     */
    public function login(Request $request): Response
    {
        $user = new Users();
        $form = $this->createForm(LoginType::class,$user);

        $form->handleRequest($request);

        $loginUser = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findOneBy(['email' => $user->getEmail()]);

        if ($loginUser && $loginUser->getPassword() === $user->getPassword()) {
            return $this->redirectToRoute('books');
        }

        return $this->render('store/login.html.twig', [
            'formUser' => $form->createView(),
        ]);
    }

    /**
     * @Route("/Books/{id}", name="details")
     */
    public function details($id): Response
    {
        $book = $this->getDoctrine()
            ->getRepository(Books::class)
            ->find($id);

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
