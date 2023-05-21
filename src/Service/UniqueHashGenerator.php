<?php

namespace App\Service;

class UniqueHashGenerator implements UniqueHashGeneratorInterface
{
    public function generate(int $number) : string
    {
        if ($number < 0 || $number >= 1000000) {
            throw new \Exception('Out of range');
        }

        $newNumber = ($number * 700001) % 1000000;

        return sprintf('%06d', $newNumber);
    }
}