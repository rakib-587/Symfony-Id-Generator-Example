<?php

namespace App\Service;

class UniqueHashGenerator implements UniqueHashGeneratorInterface
{
    public function generate(int $number, int $length) : string
    {
        $upperLimit = 9 * (10 ** ($length - 1));

        if ($number < 1 || $number > $upperLimit) {
            throw new \Exception('Out of range');
        }

        $newNumber = $number + 10 ** ($length - 1) - 1;
        return (string)$newNumber;
    }
}