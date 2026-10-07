<?php

require_once __DIR__ . '/../autoload.php';

echo "Langement des tests...\n\n";

$testFiles = glob(__DIR__ . '/test_*.php');

foreach ($testFiles as $file) {
    echo "- Execution de " . basename($file) . "\n";
    require_once $file;
}

echo "\nTous les tests ont ete executes.\n";
