<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;

class OrderNumberGenerator extends AbstractIdGenerator
{
    public function __construct(
        private MyRandomStringGenerator $stringGenerator,
        private UuidGenerator $uuidGenerator,
        private int $maxRetry = 1,
        private int $length = 11,
        private string $chars = '0123456789abcdefghijklmnopqrstuvwxyz'
    )
    {
    }

    public function generate(EntityManager $em, $entity)
    {
        $repository = $em->getRepository(get_class($entity));
        
        return $this->uuidGenerator->generate(
            $this->stringGenerator,
            $repository,
            'orderNumber',
            $this->maxRetry,
            $this->length,
            $this->chars
        );
    }
}