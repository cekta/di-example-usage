<?php

declare(strict_types=1);

use App\Example;
use App\Example2;
use App\Example4;
use App\Example4Factory;
use App\Example4Singleton;
use App\Project;

require __DIR__ . '/vendor/autoload.php';

$project = new Project($_ENV);
$container = $project->createContainer();

$must_be_available = [
    Example::class,
    Example2::class,
//    App\Example3::class, //overwritten by params
    Example4::class,
    Example4Singleton::class,
    Example4Factory::class,
];

var_dump($container->get($must_be_available[rand(0, 4)]));