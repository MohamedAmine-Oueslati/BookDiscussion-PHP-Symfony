<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use App\Entity\Books;
use App\Entity\Users;

class StoreController extends AbstractController
{

    /**
     * @Route("/Register", name="register")
     */
    public function register(Request $request, ObjectManager $manager): Response
    {

        $user = new Users();
        $form = $this->createFormBuilder($user)
                     ->add('username',TextType::class,["attr" => ["placeholder" => "Username"]])
                     ->add('email',EmailType::class,["attr" => ["placeholder" => "Email"]])
                     ->add('password',PasswordType::class,["attr" => ["placeholder" => "Password"]])
                     ->add('save', SubmitType::class, ['label' => 'Register'])
                     ->getForm();


                     $manager->persist($user);
                     $manager->flush();
                     
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
        $form = $this->createFormBuilder($user)
                     ->add('email',EmailType::class,["attr" => ["placeholder" => "Email"]])
                     ->add('password',PasswordType::class,["attr" => ["placeholder" => "Password"]])
                     ->add('save', SubmitType::class, ['label' => 'Login'])
                     ->getForm();


        return $this->render('store/login.html.twig', [
            'formUser' => $form->createView(),
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
