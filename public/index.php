<?php
session_start();

include_once "../core/autoload.php";


(new Router())->run();
//($Router = new Router())->run();
// $Router = new Router();
// $Router->run();

//$SQL = new SelectSQL();
//$SQL->WHERE = 6;
//echo $SQL->getSQL();
//
//$SQL->SELECT = '**';
//echo $SQL->SELECT;

//ErrorHandler::add('123', [3, 4, 5]);
//ErrorHandler::add('123', [3, 4, 5]);
//ErrorHandler::add('456', [3, 4, 5]);

//echo ErrorHandler::read();