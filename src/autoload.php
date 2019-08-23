<?php

spl_autoload_register(
    function ($class) {

        $source = $_SERVER['DOCUMENT_ROOT'] . str_replace(
                ['\\App\\', "\\"],
                ['\\src\\', DIRECTORY_SEPARATOR],
                "\\$class.php"
            );

        if (file_exists($source)) {
            require_once $source;
        }
    }
);