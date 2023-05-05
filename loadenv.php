<?php

function loadEnv()
{
    $envFile = __DIR__ . '/.env';
    if (!file_exists($envFile)) {
        return;
    }

    $envLines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($envLines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        putenv("$name=$value");
    }
}

loadEnv();
?>