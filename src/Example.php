<?php

declare(strict_types=1);

namespace App;

class Example
{
    public function __construct(
        private A $a,
        private B $b,
    ) {
    }
}
