<?php
namespace PTS\SymfonyAsset;

use Symfony\Component\Asset\VersionStrategy\VersionStrategyInterface;

class LastModifyStrategy implements VersionStrategyInterface
{
    /** @var string */
    protected $staticDir;

    /**
     * @param string|null $staticDir
     */
    public function __construct($staticDir)
    {
        $this->staticDir = $staticDir;
    }

    /**
     * @inheritdoc
     */
    public function getVersion($path)
    {
        $path = $this->staticDir . '/' . $path;
        return file_exists($path) ? (string)filemtime($path) : '';
    }

    /**
     * @inheritdoc
     */
    public function applyVersion($path)
    {
        $version = $this->getVersion($path);
        return $version ? sprintf('%s?v=%s', $path, $version) : $path;
    }
}
