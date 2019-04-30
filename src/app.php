<?php
require __DIR__ . '/../vendor/autoload.php';

use \LeanCloud\Client;
use \LeanCloud\Storage\CookieStorage;
use \LeanCloud\Engine\LeanEngine;

Client::initialize(
    getenv("LEANCLOUD_APP_ID"),
    getenv("LEANCLOUD_APP_KEY"),
    getenv("LEANCLOUD_APP_MASTER_KEY")
);

Client::setStorage(new CookieStorage());
Client::useProduction((getenv("LEANCLOUD_APP_ENV") === "production") ? true : false);
Client::useRegion(strtoupper(getenv("LEANCLOUD_REGION")));

LeanEngine::enableHttpsRedirect();
$engine = new LeanEngine();
$engine->start();
