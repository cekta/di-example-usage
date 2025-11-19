<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$project = new \App\Project($_ENV);
$project->compile();