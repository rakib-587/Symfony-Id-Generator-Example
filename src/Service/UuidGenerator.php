<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;

class UuidGenerator extends AbstractIdGenerator
{
    public function __construct(
        private MyRandomStringGenerator $stringGenerator,
        private int $maxRetry = 1,
        private int $length = 11,
        private string $chars = '0123456789abcdefghijklmnopqrstuvwxyz'
    )
    {
    }

    public function generate(EntityManager $em, $entity)
    {
        $attempt = 0;

        while ($attempt < $this->maxRetry) {
            $string = $this->stringGenerator->generate($this->length, $this->chars);
            $item = $em->find(get_class($entity), $string);

            if (!$item) {
                return $string;
            }

            $attempt++;
        }
        
        throw new \Exception('Failed to generate a unique id');
    }
}