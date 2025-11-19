<?php

declare(strict_types=1);

namespace App;

class Example
{
    private array $variadic_ints;
    public function __construct(
        private A $a,
        private B $b,
        private string $username, // example primitive (like string, int, dobule, array, ...)
        private $password, // without type hints
        private I $i,
        private AbstractClass $abstract_class,
        private (AbstractClass & I)| string $dnf_types,
        private string|int $intersection_type,
        private AbstractClass & I $union_type,
        int ...$variadic_ints
    ) {
        $this->variadic_ints = $variadic_ints;
    }
}
