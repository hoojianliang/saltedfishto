<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9f42e73a147bb7e66081f80aa6517cf
{
    public static $files = array (
        '9fef4034ed73e26a337d9856ea126f7f' => __DIR__ . '/..' . '/codeinwp/themeisle-sdk/load.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite9f42e73a147bb7e66081f80aa6517cf::$classMap;

        }, null, ClassLoader::class);
    }
}
