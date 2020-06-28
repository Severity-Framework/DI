<?php declare(strict_types=1);

namespace Severity\DI;

class DependencyManager
{
    protected DIConfiguration $configuration;
    protected DependencyCompiler $compiler;

    public function __construct(DIConfiguration $configuration, DependencyCompiler $compiler)
    {
        $this->configuration = $configuration;
        $this->compiler      = $compiler;
    }

    public function load(string $path): DependencyCompiler
    {
        return $this->compiler->load($path);
    }
}
