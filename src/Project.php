<?php

declare(strict_types=1);

namespace App;

use Cekta\DI\Compiler;
use Psr\Container\ContainerInterface;
use RuntimeException;

class Project
{
    private string $container_file;
    private string $container_fqcn;
    private int $container_permission;

    public function __construct(private array $env)
    {
        $this->container_file = realpath(__DIR__ . '/..') . '/runtime/Container.php';
        $this->container_fqcn = 'App\\Runtime\\Container';
        $this->container_permission = 0777;
    }

    public function createContainer(): ContainerInterface
    {
        if (!class_exists($this->container_fqcn)) {
            throw new RuntimeException("$this->container_fqcn class not found, maybe need generate ?");
        }
        return new ($this->container_fqcn)($this->params());
    }

    /** 
     * @noinspection PhpFullyQualifiedNameUsageInspection
     * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
     */
    public function compile(): void
    {
        // Ваша конфигурация для кода генерации
        $content = new Compiler(
            containers: [
                Example::class,
            ],
            params: $this->params(),
            alias: [
                \App\I::class => \App\I\R2::class,
                \App\AbstractClass::class => \App\AbstractClass\R1::class,
                sprintf('%s&%s', AbstractClass::class, I::class) => \App\Union::class,
            ],
            fqcn: $this->container_fqcn,
        )->compile();
        if (file_put_contents($this->container_file, $content, LOCK_EX) === false) {
            throw new RuntimeException("$this->container_file cant compile");
        }
        chmod($this->container_file, $this->container_permission);
    }

    private function params()
    {
        return [
            // Ваши параметры, можно использовать $this->env
            'username' => $this->env['USERNAME'] ?? 'default username',
            // can overwrite by env by : 'USERNAME="new value" php app.php' in runtime
            'password' => $this->env['PASSWORD'] ?? 'default password',
            sprintf('(%s&%s)|%s', AbstractClass::class, I::class, 'string') => 'default dnf type',
            'string|int' => 'default intersaction type',
        ];
    }
}
