<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit68a7f06ca9b0cd7ff04beafb6e7f56e1
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit68a7f06ca9b0cd7ff04beafb6e7f56e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit68a7f06ca9b0cd7ff04beafb6e7f56e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit68a7f06ca9b0cd7ff04beafb6e7f56e1::$classMap;

        }, null, ClassLoader::class);
    }
}