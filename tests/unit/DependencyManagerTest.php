<?php declare(strict_types=1);

namespace Severity\DI\Tests\Unit;

use Severity\DI\Compiler\ExpirationManager;
use Severity\DI\DependencyCompiler;
use Severity\DI\DependencyManager;
use Severity\DI\DIConfiguration;
use Severity\DI\Tests\Utility\Contracts\DITestCase;

class DependencyManagerTest extends DITestCase
{
    public function testUsage(): void
    {
        $diConfig = new DIConfiguration('path/to/cache', true);
        $compiler = new DependencyCompiler(new ExpirationManager());

        $di = new DependencyManager($diConfig, $compiler);

        $loader = $di->load(self::getFixturePath('test_config_a.yaml'))
                     ->load(self::getFixturePath('test_config_b.yaml'));

        $container = $loader->getContainer();

        $container->getService('myClass');
    }
}
