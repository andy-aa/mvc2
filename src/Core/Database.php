<?php

namespace App\Core;

use App\Controller\ErrorController;
use mysqli;
use mysqli_sql_exception;

class Database
{

    private static $instance = null;

    static private function newLink(): mysqli
    {

        try {
            mysqli_report(MYSQLI_REPORT_STRICT);

            $newLink = new mysqli(
                Conf::MYSQL_HOST,
                Conf::MYSQL_USER,
                Conf::MYSQL_PASS,
                Conf::MYSQL_DB
            );

            mysqli_report(MYSQLI_REPORT_OFF);

            return $newLink;

        } catch (mysqli_sql_exception $e) {
            (new ErrorController())->notFoundError("Error connecting to database");
        }

    }

    static public function Link()
    {
        return self::$instance ?? self::$instance = self::newLink();
    }
}
