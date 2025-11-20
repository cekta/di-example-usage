<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$project = new \App\Project($_ENV);
$container = $project->createContainer();

var_dump(
    $container->get(\App\Example::class),
    $container->get(\App\Example::class)->a === $container->get(\App\Example2::class)->a,
);
