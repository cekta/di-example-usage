<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$project = new \App\Project($_ENV);
$container = $project->createContainer();

$fn = function (string $name) use ($project) {
    $container = $project->createContainer();
    var_dump($container->get($name) === $container->get($name));
    
    $container2 = $project->createContainer();
    var_dump($container->get($name) === $container2->get($name));
};

echo "life cycle: default(scoped)" . PHP_EOL;
$fn(\App\Example4::class);

echo "life cycle: singleton" . PHP_EOL;
$fn(\App\Example4Singleton::class);

echo "life cycle: factory" . PHP_EOL;
$fn(\App\Example4Factory::class);
