<?php

namespace App\Service;

class Slugify 

{
    public function generate(string $title): string
    {
        $slug = str_replace(" ", "-", $title);
        return $slug;
    }
}