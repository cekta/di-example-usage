<?php

declare(strict_types=1);

namespace App;

class Example
{
    public function __construct(
        private A $a,
        private B $b,
        private string $username, // example primitive (like string, int, dobule, array, ...)
        private $password, // without type hints
        private I $i,
        private AbstractClass $abstract_class,
    ) {
    }
}
