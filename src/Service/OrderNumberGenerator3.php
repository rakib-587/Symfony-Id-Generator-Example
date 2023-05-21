<?php

namespace App\Service;

use App\Repository\OrderRepository;

class OrderNumberGenerator3 implements OrderNumberGeneratorInterface
{
    public function __construct(private OrderRepository $orderRepository)
    {
    }
    
    public function generate() : string
    {
        $results = $this->orderRepository->findAll();
        $orders = [];

        foreach ($results as $order) {
            $orders[$order->getOrderNumber()] = $order->getId();
        }
        
        while (true) {
            $number = (string)rand(100000, 999999);

            if (!isset($orders[$number])) {
                return $number;
            }
        }
    }
}