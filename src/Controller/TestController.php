<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'app_test')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $order = new Order();
        $entityManager->persist($order);
        dd($order);
        
        return $this->render('test/index.html.twig', [
            'user' => 'TestController',
        ]);
    }
}
