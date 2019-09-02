<?php

namespace App\Core;

use App\Controller\ErrorController;
use mysqli;
use mysqli_sql_exception;

mysqli_report(MYSQLI_REPORT_STRICT);

class Database
{

    private static $instance = null;

    static private function newLink(): mysqli
    {

        try {
            return @new mysqli(
                Conf::MYSQL_HOST,
                Conf::MYSQL_USER,
                Conf::MYSQL_PASS,
                Conf::MYSQL_DB
            );
        } catch (mysqli_sql_exception $e) {
            (new ErrorController())->notFoundError($e->getMessage());
        }

    }

    static public function Link()
    {
            return self::$instance ?? self::$instance = self::newLink();
    }
}
