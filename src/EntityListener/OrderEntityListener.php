<?php

namespace App\EntityListener;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Service\OrderNumberGenerator;

#[AsEntityListener(event: Events::prePersist, entity: Order::class)]
class OrderEntityListener
{
    public function __construct(
        private OrderNumberGenerator $orderNumberGenerator,
    ) {
    }

    public function prePersist(Order $order, LifecycleEventArgs $event)
    {
        $order->setOrderNumber($this->orderNumberGenerator->generate());
    }
}