<?php

namespace App\Service;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UuidGenerator
{
    public function __construct()
    {
    }

    public function generate(
        $stringGenerator,
        ServiceEntityRepository $repository,
        $field,
        $maxRetry,
        $length,
        $chars
    )
    {
        $attempt = 0;

        while ($attempt < $maxRetry) {
            $string = $stringGenerator->generate($length, $chars);
            $item = $repository->findOneBy([$field => $string]);

            if (!$item) {
                return $string;
            }

            $attempt++;
        }
        
        throw new \Exception('Failed to generate a unique id');
    }
}