<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb6d80d5b2931cd9ffaf8524ecd4a6fdf
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb6d80d5b2931cd9ffaf8524ecd4a6fdf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb6d80d5b2931cd9ffaf8524ecd4a6fdf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb6d80d5b2931cd9ffaf8524ecd4a6fdf::$classMap;

        }, null, ClassLoader::class);
    }
}
