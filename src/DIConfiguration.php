<?php declare(strict_types=1);

namespace Severity\DI;

class DIConfiguration
{
    protected string $cachePath;
    protected bool $devMode;

    public function __construct(string $cachePath, bool $devMode = false)
    {
        $this->cachePath = $cachePath;
        $this->devMode   = $devMode;
    }

    /**
     * @return string
     */
    public function getCachePath(): string
    {
        return $this->cachePath;
    }

    /**
     * @param string $cachePath
     *
     * @return static
     */
    public function setCachePath(string $cachePath): self
    {
        $this->cachePath = $cachePath;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDevMode(): bool
    {
        return $this->devMode;
    }

    /**
     * @param bool $devMode
     *
     * @return static
     */
    public function setDevMode(bool $devMode): self
    {
        $this->devMode = $devMode;

        return $this;
    }
}