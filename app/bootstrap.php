<?php

namespace App;
use App\core\Route;

require_once 'core' . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__DIR__,1) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require_once DATA . DIRECTORY_SEPARATOR . 'DB.php';

Route::start();
