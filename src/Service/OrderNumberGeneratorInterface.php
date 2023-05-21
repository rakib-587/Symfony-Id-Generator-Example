<?php

namespace App\Service;

interface OrderNumberGeneratorInterface
{
    public function generate() : string;
}
