<?php
$dir = null;
$internal = __DIR__ . '/../vendor/';
if (realpath($internal)) {
    $dir = $internal;
} else {
    $dir = realpath(__DIR__ . '/../../../') . '/';
}
/** @var Composer\Autoload\ClassLoader $autoloader */
$autoloader = require $dir . 'autoload.php';
