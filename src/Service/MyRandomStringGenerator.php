<?php

namespace App\Service;

class MyRandomStringGenerator {
    public function generate($length, $chars) {
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $random_key = random_int(0, strlen($chars) - 1);
            $string .= $chars[$random_key];
        }

        return $string;
    }
}