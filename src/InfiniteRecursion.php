<?php

declare(strict_types=1);

namespace App;

class InfiniteRecursion
{
    public function __construct(
        private ExampleInfiniteRecursion $example_infinite_recursion
    ) {
    }

}
