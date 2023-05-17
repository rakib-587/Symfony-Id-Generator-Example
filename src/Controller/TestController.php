<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'app_test')]
    public function index(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findBy([], ['id' => 'DESC']);
        return $this->render('test/index.html.twig', [
            'orders' => $orders,
        ]);
    }

    #[Route('/generate-order', name: 'app_generate_order')]
    public function generateOrder(EntityManagerInterface $entityManager): Response
    {
        $order = new Order();
        $entityManager->persist($order);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_test');
    }
}
