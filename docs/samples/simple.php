<?php
include __DIR__ . '/bootstrap.php';

use Slince\Upload\UploadHandlerBuilder;

$builder = new UploadHandlerBuilder();
$handler = $builder
    ->saveTo(__DIR__ . '/dst')
    ->getHandler();

$files = $handler->handle();

foreach ($files as $file) {
    if ($file instanceof \Exception) {
        echo 'upload error: ' . $file->getMessage(), PHP_EOL;
    } else {
        echo 'upload ok, path:' . $file->getPathname();
    }
}