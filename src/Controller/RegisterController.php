<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    #[Route('/register', name: 'app_register')]
    public function index(Request $request, UserPasswordHasherInterface $hasher): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterFormType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid())
        {
            $pass = $form->get('password')->getData();
            $password = $hasher->hashPassword($user, $pass);
            $user = $form->getData();
            $user->setPassword($password);
            $this->manager->persist($user);
            $this->manager->flush();
            $this->redirectToRoute('app_login');
        }
        return $this->render('register/index.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
