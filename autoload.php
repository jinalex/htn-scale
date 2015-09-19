<?php

spl_autoload_register(function ($class) {
    if (($class == 'FirebaseItem') || ($class == 'FirebaseCollection')) {
        require_once 'FirebaseItems.php';
    }
    elseif (($class == 'FirebasePusher') || ($class == 'FirebasePuller')) {
        require_once 'FirebaseFactory.php';
    }
    elseif ($class == 'Renderer') {
        require_once 'Renderer.php';
    }
    // the package namespace
    $ns = 'Firebase';

    $base_dir = __DIR__ . '/src';

    $prefix_len = strlen($ns);
    if (substr($class, 0, $prefix_len) !== $ns) {
        return;
    }


    // strip the prefix off the class
    $class = substr($class, $prefix_len);

    // a partial filename
    $file = $base_dir .str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';


    if (is_readable($file)) {
        require $file;
    }

});