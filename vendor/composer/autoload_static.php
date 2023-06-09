<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f008bdabc7291ad2555140d117e2c49
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f008bdabc7291ad2555140d117e2c49::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f008bdabc7291ad2555140d117e2c49::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6f008bdabc7291ad2555140d117e2c49::$classMap;

        }, null, ClassLoader::class);
    }
}
