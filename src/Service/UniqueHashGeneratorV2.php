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
        $string = (string)$newNumber;

        $result = '';
        $total = 0;

        for ($i = $length; $i > 0; $i--) {
            $total += (int)$string[$i - 1] + ($i ** 2);
            $char = $i === 1 ? $this->digits[$total % 9] : $this->digits[$total % 10];

            $result = $char . $result;
        }

        return $result;
    }
}