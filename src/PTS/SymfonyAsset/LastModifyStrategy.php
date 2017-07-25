<?php
namespace PTS\SymfonyAsset;

use Symfony\Component\Asset\VersionStrategy\VersionStrategyInterface;

class LastModifyStrategy implements VersionStrategyInterface
{
    /** @var string */
    protected $staticDir;
    /** @var null|string */
    protected $cdnHost;

    /**
     * @param string $staticDir
     * @param string|null $cdnHost
     */
    public function __construct($staticDir, $cdnHost = null)
    {
        $this->staticDir = $staticDir;
        $this->cdnHost = $cdnHost;
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
    public function applyVersion($relPath)
    {
        $version = $this->getVersion($relPath);
        $path = $version ? sprintf('%s?v=%s', $relPath, $version) : $relPath;

        if ($this->cdnHost) {
            if (mb_substr($path, 0, 1, "UTF-8") !== '/') {
                $path = '/' . $path;
            }

            $path = '//' . $this->cdnHost . $path;
        }

        return $path;
    }
}
