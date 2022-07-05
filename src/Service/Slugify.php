<?php

namespace App\Service;

class Slugify 

{
    public function generate(string $input): string
    {
        $this->str_replace(" ", "-", $input);
        return $input;
    }
}