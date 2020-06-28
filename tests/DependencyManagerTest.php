<?php declare(strict_types=1);

namespace Severity\DI\Tests\Unit;

use DependencyManager;
use PHPUnit\Framework\TestCase;
use Severity\DI\Fixtures\MyClass;

class DependencyManagerTest extends TestCase
{
    public function testUsage(): void
    {
        $di = new DependencyManager('path/to/cache');

        $loader = $di->load([
                'services' => [
                    'myClass' => MyClass::class
                ]
            ])
            ->load([
                'services' => [
                    'mySecondService' => MyClass::class
                ]
            ]);

        $container = $loader->getContainer();

        $container->getService('myClass');
    }
}
