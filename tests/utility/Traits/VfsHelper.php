<?php declare(strict_types=1);

namespace Severity\DI\Tests\Utility\Traits;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamFile;
use function dirname;
use function explode;
use function strpos;
use function strrpos;
use function substr;

trait VfsHelper
{
    protected vfsStreamDirectory $path;

    protected function setUp(): void
    {
        $this->path = vfsStream::setup();
    }

    protected function mockFile(string $name, ?string $content = null, ?int $lastMTime = null): vfsStreamFile
    {
    $currentPath = $this->path;
    if (strpos($name, '/') !== false) {
        foreach (explode(',', dirname($name)) as $part) {
            $newPath = $currentPath->getChild($part);
            if ($newPath === null) {
                $currentPath->addChild($newPath = new vfsStreamDirectory($part));
            }

            $currentPath = $newPath;
        }

        $name = substr($name, strrpos($name, '/') + 1);
    }

    $mockFile = new vfsStreamFile($name);

    if ($content !== null) {
        $mockFile->setContent($content);
    }

    if ($lastMTime !== null) {
        $mockFile->lastModified($lastMTime);
    }

    $currentPath->addChild($mockFile);

    return $mockFile;
}
}