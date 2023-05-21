<?php

namespace App\EntityListener;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Service\UniqueNumberGenerator;

#[AsEntityListener(event: Events::prePersist, entity: Order::class)]
class OrderEntityListener
{
    public function __construct(
        private UniqueNumberGenerator $uniqueNumberGenerator,
        private OrderRepository $orderRepository
    ) {
    }

    public function prePersist(Order $order, LifecycleEventArgs $event)
    {
        $lastOrder = $this->orderRepository->findOneBy([], ['id' => 'DESC']);
        $number = $lastOrder ? $lastOrder->getId() + 1 : 1;

        $order->setOrderNumber($this->uniqueNumberGenerator->generate($number));
    }
}