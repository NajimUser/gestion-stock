<?php

spl_autoload_register(function (string $classe) {
    $relativeClass = str_replace('App\\', '', $classe);
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
