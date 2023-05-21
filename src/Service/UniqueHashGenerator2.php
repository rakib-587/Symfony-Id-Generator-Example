<?php

namespace App\Service;

class UniqueHashGenerator2 implements UniqueHashGeneratorInterface
{
    private $digits = [4, 8, 1, 5, 6, 3, 2, 7, 9, 0];

    public function generate(int $number) : string
    {
        if ($number < 0 || $number >= 1000000) {
            throw new \Exception('Out of range');
        }

        $newNumber = ($number * 700001) % 1000000;

        $string = sprintf('%06d', $newNumber);
        $result = '';

        for ($i = 0; $i < 6; $i++) {
            $result .= ($this->digits[$string[$i]] + ($i ** 2)) % 10;
        }

        return $result;
    }
}