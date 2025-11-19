<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$project = new \App\Project($_ENV);
$container = $project->createContainer();

var_dump($container->get(\App\Example::class));
