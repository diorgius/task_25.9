<?php

namespace App;
use App\core\Route;

require_once 'core' . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__DIR__,1) . '/vendor/autoload.php';
require_once 'data' . DIRECTORY_SEPARATOR . 'DB.php';

Route::start();
