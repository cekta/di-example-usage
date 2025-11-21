<?php

declare(strict_types=1);

namespace App;

class ExampleInfiniteRecursion
{
    public function __construct(
        private InfiniteRecursion $infinite_recursion
    ) {
    }
}
