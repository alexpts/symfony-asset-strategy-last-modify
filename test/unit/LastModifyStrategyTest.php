<?php
namespace PTS\SymfonyAsset;

use PHPUnit_Framework_TestCase;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\PathPackage;

class LastModifyStrategyTest extends PHPUnit_Framework_TestCase
{

    public function testPackage()
    {
        $baseDir = __DIR__;
        $package = new Package(new LastModifyStrategy($baseDir));

        $url = $package->getUrl('/LastModifyStrategyTest.php');
        $expected = '/LastModifyStrategyTest.php?v=' . filemtime($baseDir . '/LastModifyStrategyTest.php');
        self::assertEquals($expected, $url);
    }

    public function testPackageAbsolutePath()
    {
        $baseDir = __DIR__;
        $package = new Package(new LastModifyStrategy($baseDir));

        $url = $package->getUrl('//static.domain.co/LastModifyStrategyTest.php');
        self::assertEquals('//static.domain.co/LastModifyStrategyTest.php', $url);
    }

    public function testPackageNotFoundFileInBaseDir()
    {
        $baseDir = dirname(__DIR__);
        $package = new Package(new LastModifyStrategy($baseDir));

        $url = $package->getUrl('/LastModifyStrategyTest.php');
        self::assertEquals('/LastModifyStrategyTest.php', $url);
    }

    public function testPackageNotFoundFile()
    {
        $baseDir = dirname(__DIR__);
        $package = new Package(new LastModifyStrategy($baseDir));

        $url = $package->getUrl('/some.css');
        self::assertEquals('/some.css', $url);
    }

    public function testPackagePath()
    {
        $baseDir = __DIR__;
        $package = new PathPackage('unit', new LastModifyStrategy($baseDir));

        $url = $package->getUrl('LastModifyStrategyTest.php');
        $expected = '/unit/LastModifyStrategyTest.php?v=' . filemtime($baseDir . '/LastModifyStrategyTest.php');
        self::assertEquals($expected, $url);
    }


}