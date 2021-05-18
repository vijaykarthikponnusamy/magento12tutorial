<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd28498b729b2f31290aaa52b2cdd6e4e
{
    public static $files = array (
        'f6d554847ec63ae824ab53137b367909' => __DIR__ . '/../..' . '/registration.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyCompany\\TaskEmpty\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyCompany\\TaskEmpty\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd28498b729b2f31290aaa52b2cdd6e4e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd28498b729b2f31290aaa52b2cdd6e4e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd28498b729b2f31290aaa52b2cdd6e4e::$classMap;

        }, null, ClassLoader::class);
    }
}