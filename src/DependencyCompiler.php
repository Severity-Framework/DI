<?php declare(strict_types=1);

namespace Severity\DI;

use Severity\DI\Compiler\ExpirationManager;

class DependencyCompiler
{
    protected ExpirationManager $validationManager;

    public function __construct(ExpirationManager $validationManager)
    {
        $this->validationManager = $validationManager;
    }

    public function load(string $path): self
    {

    }

    public function getContainer(): Container
    {
        
    }
}