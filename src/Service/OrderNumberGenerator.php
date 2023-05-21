<?php

namespace App\Service;

use App\Repository\OrderRepository;

class OrderNumberGenerator implements OrderNumberGeneratorInterface
{
    public function __construct(
        private OrderRepository $orderRepository,
        private UniqueHashGeneratorInterface $generator
    )
    {
    }

    public function generate(): string
    {
        $lastOrder = $this->orderRepository->findOneBy([], ['id' => 'DESC']);
        $number = $lastOrder ? $lastOrder->getId() + 1 : 1;
        return $this->generator->generate($number, 6);
    }
}