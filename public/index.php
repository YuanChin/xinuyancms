<?php

namespace Xinyuan;

require '../vendor/autoload.php';

use Xinyuan\App;
use Xinyuan\Http\Request;


// 定義基礎路徑常量
define('__BASEDIR__', __DIR__ . '/..');

$app = new App();

$app->handle($request = new Request())->send();
