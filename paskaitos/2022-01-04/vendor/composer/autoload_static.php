<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5b5cfa260156b2390d839eb27562ff00
{
    public static $files = array (
        '5d9c5be1aa1fbc12016e2c5bd16bbc70' => __DIR__ . '/..' . '/dusank/knapsack/src/collection_functions.php',
        'e5fde315a98ded36f9b25eb160f6c9fc' => __DIR__ . '/..' . '/dusank/knapsack/src/utility_functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Test\\' => 5,
        ),
        'S' => 
        array (
            'Simplon\\Mysql\\' => 14,
            'Simplon\\Helper\\' => 15,
        ),
        'D' => 
        array (
            'DusanKasan\\Knapsack\\' => 20,
        ),
        'C' => 
        array (
            'Crud\\' => 5,
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/simplon/mysql/test',
        ),
        'Simplon\\Mysql\\' => 
        array (
            0 => __DIR__ . '/..' . '/simplon/mysql/src',
        ),
        'Simplon\\Helper\\' => 
        array (
            0 => __DIR__ . '/..' . '/simplon/helper/src',
        ),
        'DusanKasan\\Knapsack\\' => 
        array (
            0 => __DIR__ . '/..' . '/dusank/knapsack/src',
        ),
        'Crud\\' => 
        array (
            0 => __DIR__ . '/../..' . '/crud',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5b5cfa260156b2390d839eb27562ff00::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5b5cfa260156b2390d839eb27562ff00::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5b5cfa260156b2390d839eb27562ff00::$classMap;

        }, null, ClassLoader::class);
    }
}