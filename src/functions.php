<?php

use JetBrains\PhpStorm\NoReturn;

function base_path($path): string
{
    return __DIR__ . '/../' . $path;
}

#[NoReturn] function dd($value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function isClosure($closure): bool
{
    return $closure instanceof \Closure;
}