<?php

namespace App\Service;

use App\Repository\OrderRepository;

class OrderNumberGenerator2 implements OrderNumberGeneratorInterface
{
    public function __construct(private OrderRepository $orderRepository)
    {
    }

    public function generate() : string
    {
        while (true) {
            $number = (string)rand(100000, 999999);

            if ($this->isUnique($number)) {
                return $number;
            }
        }
    }

    private function isUnique($number) {
        return !$this->orderRepository->findOneBy(['orderNumber' => $number]);
    }
}