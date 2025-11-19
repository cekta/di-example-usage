<?php

declare(strict_types=1);

namespace App;

class A
{
    /**
     * @var I[]
     */
    private array $variadic_i;

    public function __construct(
        private $username, // without type hints
        private string $password, // primitive type
        I ...$variadic_i
    )
    {
        $this->variadic_i = $variadic_i;
    }

}
