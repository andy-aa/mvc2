<?php

namespace Core;

use mysqli;

class Database
{

    private static $instance = null;

    static public function Link()
    {
        return self::$instance ?? self::$instance = new mysqli(
                Conf::MYSQL_HOST,
                Conf::MYSQL_USER,
                Conf::MYSQL_PASS,
                Conf::MYSQL_DB
            );
    }
}
