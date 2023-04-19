<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4fca5f048fa71920d4e2ac978af0d71c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit4fca5f048fa71920d4e2ac978af0d71c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4fca5f048fa71920d4e2ac978af0d71c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit4fca5f048fa71920d4e2ac978af0d71c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
