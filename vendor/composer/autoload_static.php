<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit56ae98e7ae23105f16e62f1373ab59be
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tyler\\MmGfaddonListMergeTag\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tyler\\MmGfaddonListMergeTag\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit56ae98e7ae23105f16e62f1373ab59be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit56ae98e7ae23105f16e62f1373ab59be::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit56ae98e7ae23105f16e62f1373ab59be::$classMap;

        }, null, ClassLoader::class);
    }
}