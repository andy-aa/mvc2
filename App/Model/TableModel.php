<?php

namespace Model;

use Core\ErrorHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\WebProcessor;

class TableModel extends AbstractDbEntity
{
    protected function errorHandler(array $error)
    {
        ErrorHandler::add('MySql', $error);

        $log = new Logger('MySql');
        $log->pushHandler(new StreamHandler("$_SERVER[DOCUMENT_ROOT]/logs/error.log", Logger::DEBUG));
        $log->pushProcessor(new WebProcessor());
        $log->error("ClassName: " . static::class, $error);
    }

}