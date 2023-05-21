<?php

namespace App\Service;

interface UniqueHashGeneratorInterface
{
    public function generate(int $number) : string;
}
