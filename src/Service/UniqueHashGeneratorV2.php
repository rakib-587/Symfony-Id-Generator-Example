<?php

namespace App\Service;

class UniqueHashGeneratorV2 implements UniqueHashGeneratorInterface
{
    private $digits = [4, 8, 1, 5, 6, 3, 2, 7, 9, 0];

    public function generate(int $number, int $length) : string
    {
        $upperLimit = 9 * (10 ** ($length - 1));

        if ($number < 1 || $number > $upperLimit) {
            throw new \Exception('Out of range');
        }

        $newNumber = $number + 10 ** ($length - 1) - 1;

        //Here GCD(1000000, 700001) = 1, So generated numbers will be unique.
        $newNumber = ($newNumber * 700001) % 1000000;

        $string = sprintf('%06d', $newNumber);
        $result = '';

        for ($i = 0; $i < 6; $i++) {
            $result .= ($this->digits[$string[$i]] + ($i ** 2)) % 10;
        }

        return $result;
    }
}