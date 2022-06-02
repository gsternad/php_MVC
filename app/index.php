<?php

namespace App;

use App\Core\Bootstrap;
use App\Core\Request;

/** Loads auto loading capability.  */
require_once '../vendor/autoload.php';

/** @var Deploy our application. $bootstrap */
$bootstrap = new Bootstrap();
$bootstrap->deploy(__DIR__, new Request());
