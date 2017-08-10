<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';

if (getenv('APP_ENV') === 'dev') {
    Debug::enable();
    $kernel = new AppKernel('dev', true);
} else {
    $kernel = new AppKernel('prod', false);
}

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
