<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit83620ecfee3ac74d49f34b0dd7243369
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit83620ecfee3ac74d49f34b0dd7243369::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit83620ecfee3ac74d49f34b0dd7243369::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit83620ecfee3ac74d49f34b0dd7243369::$classMap;

        }, null, ClassLoader::class);
    }
}
