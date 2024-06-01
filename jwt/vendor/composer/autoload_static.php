<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88c9ee75c5551755542e02ee05005f57
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Smlg\\Jwt\\' => 9,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Smlg\\Jwt\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88c9ee75c5551755542e02ee05005f57::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88c9ee75c5551755542e02ee05005f57::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit88c9ee75c5551755542e02ee05005f57::$classMap;

        }, null, ClassLoader::class);
    }
}
