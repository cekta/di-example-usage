<?php

declare(strict_types=1);

namespace App;

use ReflectionClass;
use Throwable;

class ProjectDiscovery
{
    /**
     * @var array<string, string[]> key interface name, value excludes classes
     */
    private array $implements = [];

    private array $containers = [];
    

    /**
     * @param string[] $items
     */
    public function __construct(
        private readonly iterable $items,
    ) {
    }

    /**
     * @param string $name
     * @param string[] $exclude
     * @return static
     */
    public function containerImplement(string $name, array $exclude = []): static
    {
        $this->implements[$name] = array_unique(array_merge($this->implements[$name] ?? [], $exclude));
        return $this;
    }

    /**
     * @return string[]
     */
    public function getContainers(): array
    {
        $this->generate();

        return array_unique($this->containers);
    }

    private function generate(): void
    {
        foreach ($this->items as $item) {
            try {
                $class = new ReflectionClass($item);
            } catch (Throwable $e) {
                continue;
            }
            $this->checkImplement($class);
        }
    }
    
    private function checkImplement(ReflectionClass $class): void
    {
        $interface_names = $class->getInterfaceNames();
        foreach ($this->implements as $interface => $excludes) {
            if (in_array($interface, $interface_names) && !in_array($class->getName(), $excludes)) {
                $this->containers[] = $class->getName();
            }
        }
    }
}
