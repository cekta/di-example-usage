<?php

declare(strict_types=1);

namespace App;

class A
{
    public function __construct(
        private $username, // without type hints
        private string $password, // primitive type
    )
    {
    }

}
