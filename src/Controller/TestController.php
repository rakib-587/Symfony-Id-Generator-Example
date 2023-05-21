<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use App\Service\UniqueHashGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findBy([], ['id' => 'DESC']);
        return $this->render('test/index.html.twig', [
            'orders' => $orders,
        ]);
    }

    #[Route('/generate-orders', name: 'app_generate_order')]
    public function generateOrders(EntityManagerInterface $entityManager): Response
    {
        $order = new Order();
        $entityManager->persist($order);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_home');
    }

    #[Route('/test', name: 'app_test')]
    public function test(UniqueHashGeneratorInterface $generator): Response
    {
        $orders = [];

        for ($i = 1; $i < 1000000; $i++) {
            $uniqueNumber = $generator->generate($i);

            if (isset($orders[$uniqueNumber])) {
                dd( $i . ' has collided with ' . $orders[$uniqueNumber]);
            }

            $orders[$uniqueNumber] = $i;
        }

        dd('No collisions were found');

        return new Response('');
    }
}
