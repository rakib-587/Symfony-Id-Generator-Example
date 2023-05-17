<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'app_test')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $entityManager->persist($user);
        $entityManager->flush();
        dd($user);
        
        return $this->render('test/index.html.twig', [
            'user' => 'TestController',
        ]);
    }
}
