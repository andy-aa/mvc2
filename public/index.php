<?php
session_start();

include_once "../App/autoload.php";
include_once "../vendor/autoload.php";


(new Core\Router())->run();