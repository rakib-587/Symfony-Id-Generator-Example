<?php

namespace App\Service;

use App\Repository\OrderRepository;

class OrderNumberGenerator implements OrderNumberGeneratorInterface
{
    public function __construct(
        private UuidGenerator $uuidGenerator,
        private MyRandomStringGenerator $stringGenerator,
        private OrderRepository $orderRepository,
        private int $maxRetry = 1,
        private int $length = 11,
        private string $chars = '0123456789abcdefghijklmnopqrstuvwxyz'
    )
    {
    }

    public function generate() : string
    {
        return $this->uuidGenerator->generate(
            $this->stringGenerator,
            $this->orderRepository,
            'orderNumber',
            $this->maxRetry,
            $this->length,
            $this->chars
        );
    }
}