<?php

namespace App\Service;

class UniqueHashGenerator3 implements UniqueHashGeneratorInterface
{
    public function generate(int $number): string
    {
        if ($number < 1 || $number > 900000) {
            throw new \Exception('Out of range');
        }

        $newNumber = $number + 999999;
        return (string)$newNumber;
    }
}