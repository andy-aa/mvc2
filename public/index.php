<?php
session_start();

use App\Core\Router;

//include_once "../src/autoload.php";
include_once "../vendor/autoload.php";


(new Router())->run();