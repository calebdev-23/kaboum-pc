<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    #[Route('/client', name: 'app_client')]
    public function index(ClientRepository $clientRepository): Response
    {
        $clients = $clientRepository->findAll();
        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }
    #[Route('/client/{id}', name: 'app_show_client')]
    public function show( $id): Response
    {
       $client = $this->manager->getRepository(Client::class)->findOneById($id);
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }
}
