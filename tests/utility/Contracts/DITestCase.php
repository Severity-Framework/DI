<?php declare(strict_types=1);

namespace Severity\DI\Tests\Utility\Contracts;

use PHPUnit\Framework\TestCase;
use function dirname;

class DITestCase extends TestCase
{
    protected static string $cwd;

    public static function setUpBeforeClass(): void
    {
        self::$cwd = dirname(dirname(__DIR__)) . '/';
    }

    public static function getFixturePath(string $path): string
    {
        return self::$cwd . "fixtures/$path";
    }
}